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
 */
class LoginController extends BaseController
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/login", name="check_login_service")
     * @Method({"POST"})
     */
    public function loginAction(Request $request)
    {
        // retrieve username and password
        $username = $request->get('_username');
        $password = $request->get('_password');

        $em = $this->getDoctrine()->getManager();
        if ($username && $password) {

            // Retrieve the security encoder of symfony
            $factory = $this->get('security.encoder_factory');

            /// Start retrieve user
            /** @var Compte $user */
            $user = $this->getDoctrine()->getManager()->getRepository(Compte::class)
                ->findOneBy(array('username' => $username));
            /// End Retrieve user

            // Check if the user exists !
            if(!$user){
                return $this->renderJson(['user' => null, 'msg' => 'User not found']);
            }

            /// Start verification
            $encoder = $factory->getEncoder($user);
            $salt = $user->getSalt();

            if(!$encoder->isPasswordValid($user->getPassword(), $password, $salt)) {
                return $this->renderJson(['user' => null, 'msg' => 'Username or Password not valid']);
            }
            /// End Verification
            /// give token
            $user->setToken($this->getToken());
            $user->setTokenExpired(false);
            $em->persist($user);
            $em->flush();
            /// end token
            return $this->renderJson(['user' => $user]);
        }
    }

    /**
     * @param Request $request
     * @Route("/logout/{token}", name="logout")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function logoutAction(Request $request,$token){
        // get user by token
        /** @var Compte $user */
        $user = $this->getDoctrine()->getRepository(Compte::class)
            ->findOneBy(['token'=>$token,'tokenExpired'=>false]);

        if(!$user){
            return $this->renderJson(['user' => null, 'msg' => 'User not found']);
        }else{
            $em = $this->getDoctrine()->getManager();
            $user->setTokenExpired(true);
            $em->persist($user);
            $em->flush();
            return $this->renderJson(['user'=>null, 'msg'=>'Logout success']);
        }
    }

}