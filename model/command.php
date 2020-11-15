<?php


class Command
{
    public $command;
    public $args = [];

    function __construct($command, $arrayArg) {
        $this->command = $command;
        $this->args = $arrayArg;
    }

    /**
     * @return float|int
     */
    private function add() {
        return array_sum($this->args);
    }

    /**
     * @return array
     */
    private function sortAsc() {
        sort($this->args);
        return $this->args;
    }

    /**
     * @return mixed|string
     */
    private function repoDesc() {
        return $this->get_content_from_github();
    }

    /**
     * @return mixed|string
     */
    public function get_content_from_github() {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
            CURLOPT_USERAGENT      => "spider", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
        );
        $ch = curl_init();
        curl_setopt_array( $ch, $options );
        curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/'.$this->args[0].'/'.$this->args[1]);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        $content = json_decode(curl_exec($ch), true);
        curl_close($ch);
        if (!$content['description'])
            return ("Not description found on this repo");
        else
            return $content['description'];
    }

    /**
     * @return array|float|int|mixed|string
     * Execute the command
     */
    public function execute() {
        switch ($this->command) {
            case 'add':
                return $this->add();
            case 'sort-asc':
                return $this->sortAsc();
            case 'repo-desc':
                return $this->repoDesc();
            default:
                return 'This command is not recognized';
        }
    }
}