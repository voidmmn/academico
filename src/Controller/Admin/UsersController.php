<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Mailer\MailerAwareTrait;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    use MailerAwareTrait;

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'rememberPassword', 'changePassword']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                // Enviar e-mail de boas vindas ao novo usuário
                if ($this->getMailer('User')->send('welcome', [$user])) {
                    $this->Flash->success(__('As informações do usuário foram salvas.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Erro no envio de e-mails para o novo usuário. Por favor, entre em contato com o administrador do sistema.'));
            }
            $this->Flash->error(__('As informações do usuário não puderam ser salvas. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('As informações do usuário foram salvas.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('As informações do usuário não puderam ser salvas. Por favor, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O usuário foi excluído.'));
        } else {
            $this->Flash->error(__('O usuário não pôde ser excluído. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Informações incorretas. Por favor, informe novamente usuário e senha.'));
            }
        }
    }

    /**
     * Logout method
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * rememberPassword method
     */
    public function rememberPassword()
    {
        $user = $this->Users->newEntity($this->request->getData());
        if (!empty($this->request->getData()))
        {
            if ($this->request->is('post'))
            {
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($user = $this->Users->findByEmail($this->request->getData('email'))->toArray())
                {
                    $this->getMailer('User')->send('recovery', $user);
                    $msg = 'E-mail enviado para a sua caixa postal!';
                    $this->Flash->success($msg);
                    return $this->redirect(['action' => 'rememberPassword']);
                } else {
                    $msg = 'E-mail não encontrado!';
                    $this->Flash->error($msg);
                    return $this->redirect(['action' => 'rememberPassword']);
                }
            }
        }
    }    

    public function changePassword()
    {
        $q_hash = $this->request->getQuery('h');
        $q_email = $this->request->getQuery('email');
        
        $user = $this->Users->newEntity($this->request->getData());
        if ($this->request->is(['post', 'put']))
        {
            $user = $this->Users->get($this->request->getData('id'));
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
//                if ($this->getMailer('User')->send('welcome', [$user])) {
                    $this->Flash->success(__('A senha foi alterada com sucesso!'));
                    return $this->redirect(['action' => 'index']);
//                }
            }
            $this->Flash->error(__('A senha não pode ser alterada! Por favor, tente novamente.'));
        } else {
            if ($user = $this->Users->findByEmail($q_email)->toArray())
            {
                $hash = substr($user[0]['password'], 0, 25);
                if ($hash == $q_hash)
                {
                    $msg = 'Alterar senha do email: ' .$q_email;
                    $this->Flash->set($msg);                    
                } else {
                    $msg = 'Você não tem permissão para alterar a senha!';
                    $this->Flash->set($msg);                    
                    $this->redirect(array('action' => 'rememberPassword'));
                }
            } else {
                $msg = 'Usuário não encontrado!';
                $this->Flash->set($msg);                    
                $this->redirect(array('action' => 'rememberPassword'));
            }
        }
        $this->set('id', $user[0]['id']);
        $this->set(compact('user'));
    }
}