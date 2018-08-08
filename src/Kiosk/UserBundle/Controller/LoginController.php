<?php
/**
 * Created by PhpStorm.
 * User: Koera
 * Date: 8/7/18
 * Time: 1:22 PM
 */

namespace Kiosk\UserBundle\Controller;


use Kiosk\UserBundle\Entity\Compte;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class LoginController
 * @package Kiosk\UserBundle\Controller
 * @Route("/login")
 */
class LoginController extends BaseController
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/check", name="check_login_service")
     * @Method({"POST"})
     */
    public function loginAction(Request $request)
    {
        // retrieve username and password
        $username = $request->get('_username');
        $password = $request->get('_password');

        if ($username && $password) {
            $user = new Compte();

            $encoder = $this->container->get('security.password_encoder');
            $passwordEncoded = $encoder->encodePassword($user, $password);

            $userFinded = $this->getDoctrine()->getRepository(Compte::class)
                ->findOneBy(['username' => $username, 'password' => $passwordEncoded]);
            if ($userFinded) {
                return $this->renderJson(['user'=>$user]);
            } else {
                return $this->renderJson(['user' => null, 'msg' => 'User not found','password'=>$passwordEncoded]);
            }
        }
    }

}