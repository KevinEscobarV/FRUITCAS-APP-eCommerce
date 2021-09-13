<?php

namespace App\Botman;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class OnboardingConversation extends Conversation
{
    protected $name;

    protected $email;

    protected $query;

    public function askName()
    {
        $this->ask('Hola! Cual es tu nombre?', function(Answer $answer) {
            // Save result
            $this->name = $answer->getText();

            $this->say('Un placer conocerte '.$this->name);
            $this->askEmail();
        });
    }

    public function askEmail()
    {
        $this->ask('Una cosa más, ¿cuál es su dirección de correo electrónico?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Genial, eso es todo lo que necesitamos, '.$this->name);
            $this->askHelp();
        });
    }

    public function askHelp()
    {
        $this->ask('¿Te puedo ayudar en algo?', function(Answer $answer) {
            // Save result
            $this->query = $answer->getText();

            $this->say('Tu consulta ha sido enviada, pronto nos contactaremos contigo.');
        });
    }

    public function run()
    {
        // This will be called immediately
        $this->askName();
    }
}