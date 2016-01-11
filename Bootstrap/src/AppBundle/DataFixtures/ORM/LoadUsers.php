<?php
/**
 * Created by PhpStorm.
 * User: Łukasz
 * Date: 2015-11-24
 * Time: 18:43
 */
namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUsers implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }



    public function load(ObjectManager $manager)
    {
        // Get our userManager, you must implement `ContainerAwareInterface`
        $userManager = $this->container->get('fos_user.user_manager');
        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setEmail('email@domain.com');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->setImie('admin');
        $user->setNazwisko('admin');
        $user->setTelefon(132);
        $user->setRoles(array('ROLE_ADMIN'));
        // Update the user
        $userManager->updateUser($user, true);

        $userManager = $this->container->get('fos_user.user_manager');
        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('user');
        $user->setEmail('user@domain.com');
        $user->setPlainPassword('user');
        $user->setEnabled(true);
        $user->setImie('Jan');
        $user->setNazwisko('Kowalski');
        $user->setTelefon(132);
        $user->setRoles(array('ROLE_USER'));
        // Update the user
        $userManager->updateUser($user, true);
    }
    public function getOrder()
    {
        return 1;
    }
}