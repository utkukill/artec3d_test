<?php

namespace console\commands;

use console\youtube\YouTubeDownloader;
use console\youtube\Browser;
use console\dailymotion\Dailymotion;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ParseCommands extends Command
{
    protected static $defaultName = 'parse';

    public $data = array();

    protected function configure()
    {
        $this->setName('parse')
            ->setDescription('Command sample: "./parser parse http://toptailor.ru/sample.php"')
            ->addArgument('url', InputArgument::REQUIRED, 'Pass the url.');
    }

    protected function actionDailymotion($file)
    {
        // Account settings
        $apiKey        = '59536e26aa2edf58d57d';
        $apiSecret     = '947d9d29761006e8da2f8ceff7a15c7cc8a5f809';
        $testUser      = 'asking888@yandex.ru';
        $testPassword  = '{IUVpib3<HOp';
        // Scopes you need to run your tests
        $scopes = array(
            'manage_videos',
        );
        // Dailymotion object instanciation
        $api = new Dailymotion();
        $api->setGrantType(
            Dailymotion::GRANT_TYPE_PASSWORD,
            $apiKey,
            $apiSecret,
            $scopes,
            array(
                'username' => $testUser,
                'password' => $testPassword,
            )
        );
        $url = $api->uploadFile($file);
        // 2. Create the video on your channel
        $upload = $api->post(
            '/videos',
            array(
                'url'       => $url,
                'title'     => 'test vieddo',
                'tags'      => 'dailymotion,api,sdk,test',
                'channel'   => 'videogames',
                'published' => true,
            )
        );
        if($url)
        {
            return "Upload video: https://www.dailymotion.com/video/".$upload["id"];
        } else
            {
            return "Error upload video";
        }
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $br = new Browser();
        $yt = new YouTubeDownloader();
        $page = $br->get($input->getArgument('url'));
        if(!$page)
        {
            $output->writeln(sprintf('url Error: %s', $input->getArgument('url')));
        }
        else
            {
            $re = "/(\bhttps?:)?\/\/[^,\s()<>]+(?:\(\w+\)|(?:[^,[:punct:]\s]|\/))/s";
            preg_match_all($re, $page,$match);

            if(!empty($match[0]))
            {
                foreach ($match[0] as $url)
                {
                    $links = $yt->getDownloadLinks($url, "720");
                    if(!empty($links[0]["url"]))
                    {
                        $contextOptions = [
                            'ssl' => [
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                            ]
                        ];
                        $context = stream_context_create($contextOptions);
                        $data = file_get_contents($links[0]["url"], false, $context);
                        $file = md5($links[0]["url"]);
                        file_put_contents("./data/".$file.".mp4", $data);
                        $upload = $this->actionDailymotion("./data/".$file.".mp4");
                        $output->writeln($upload);
                    }
                }
            }
            else {
                $output->writeln(sprintf('Youtube urls not found, please change url: %s', $input->getArgument('url')));
            }
        }





    }
}
