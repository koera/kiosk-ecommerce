<?php
/**
 * Created by PhpStorm.
 * User: trustylabs
 * Date: 8/7/18
 * Time: 2:26 PM
 */

namespace Kiosk\UserBundle\Controller;
use Kiosk\UserBundle\Entity\Client;
use Kiosk\UserBundle\Entity\Compte;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class RegisterController
 * @package Kiosk\UserBundle\Controller\
 */
class RegisterController extends BaseController
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/register", name="register")
     * @Method({"POST"})
     */
    public function indexAction(Request $request){
        $username = $request->get('_username');
        $password = $request->get('_password');
        $email = $request->get('email');

        $em = $this->getDoctrine()->getManager();
        if($username && $password){

            // check if user exist
            if($em->getRepository(Compte::class)->findOneBy(['username'=>$username])){
                return $this->renderJson(['user'=>null,'message'=>'Username already taken']);
            }

            $user = new Compte();

            $encoder = $this->container->get('security.password_encoder');
            $passwordEncoded = $encoder->encodePassword($user, $password);

            $client = new Client();
            $em->persist($client);

            $user->setUsername($username)
                ->setPassword($passwordEncoded)
                ->setClient($client);

            $em->persist($user);
            $em->flush();
            if(!is_null($email)){
                $this->sendMailConfirmation('Confirmation account',$email,$user);
            }
            return $this->renderJson(['user'=>$user,'message'=>'insert ok']);
        }
    }

}