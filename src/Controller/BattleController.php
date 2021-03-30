<?php


namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

class BattleController extends AbstractController
{
    /**
     * @Route("/battle", name="battle_initial")
     * @param KernelInterface $kernel
     * @return Response
     * @throws Exception
     */
    public function battle (KernelInterface $kernel): Response
    {
        $application = new Application($kernel);
        $application->setAutoExit(false);
        $input = new ArrayInput([
            'command' => 'app:initiate-battle',
        ]);

        header("Content-type: text/plain");
        $output = new BufferedOutput();
        $application->run($input, $output);

        $content = $output->fetch();

        return new Response($content, 200, [ 'Content-type' => 'text/plain' ]);
    }
}