<?php
declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'User';

    public function welcome($user)
    {
        $this
        ->setTo($user->email)
        ->setProfile('academico')
        ->setEmailFormat('html')
        ->setViewVars(['nome' => $user->name])
        ->setSubject(sprintf('Bem-vindo, %s', $user->name))
        ->viewBuilder()
            ->setLayout('default')
            ->setTemplate('welcome_email_template');
    }

    public function recovery($user)
    {
        $this
        ->setTo($user->email)
        ->setProfile('academico')
        ->setEmailFormat('html')
//        ->setViewVars(['nome' => $user[0]['name'], 'email' => $user[0]['email'], 'hash' => substr($user[0]['password'], 0, 25)])
        ->setViewVars(['nome' => $user->name, 'email' => $user->email, 'hash' => substr($user->password, 0, 25)])
        ->setSubject('Sistema Acadêmico UEMG-Ituiutaba: Recuperação de Senha')
        ->viewBuilder()
            ->setLayout('default')
            ->setTemplate('recovery_email_template');
    }    
}
