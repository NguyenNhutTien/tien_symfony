<?php

namespace App\Command;

use SendGrid\Mail\Mail;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Exception;

class TienCommand extends Command
{
    protected static $defaultName = 'TienCommand';
    protected $container;
    protected $parameterBag;

    public function __construct(
        KernelInterface $kernel,
        ParameterBagInterface $parameterBag,
        string $name = null
    ) {
        $this->container = $kernel->getContainer();
        $this->parameterBag = $parameterBag;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
//        $this->uploadFileToS3();
        $this->sendMailSendGrid();
        return 0;
    }

    protected function uploadFileToS3(){
        $storage = $this->container->get('demo_storage');
        // Upload a file with the content "content text" and the MIME-Type text/plain
        $storage->upload('test.txt', 'content text', ['contentType' => 'text/plain']);

        // Upload a local existing File and let the service automatically detect the mime type.
        $storage->uploadFile('demo.pdf');
    }

    protected function sendMailSendGrid()
    {
        $email = new Mail();
        $email->setFrom("tien.nguyen@nfq.asia", "Tien Nguyen");
        $email->setSubject("Sending with SendGrid is Fun");
        $email->addTo("nguyennhuttien1998@gmail.com", "Nguyen Nhut Tien");
        $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
            "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        );
        $sendgrid = new \SendGrid($this->parameterBag->get('sendgrid_api_key'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }
}
