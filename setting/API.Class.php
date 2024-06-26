<?php 

# 

class API
{
    ###################### PROPERTY
        protected $token;
        protected $id_user;
        protected $key_acess;
    ###########>

    ###################### SET 
        private  function setToken($token)
        {
            $this->token = $token;
        }
        private  function setID_user($id_user)
        {
            $this->id_user = $id_user;
        }
        private  function setKey_acess($key_acess)
        {
            $this->key_acess = $key_acess;
        }
    ###########>

    ###################### GET
        private function getToken()
        {
            return $this->token;
        }
        private function getID_user()
        {
            return $this->id_user;
        }
        private function getKey_acess()
        {
            return $this->key_acess;
        }
    ###########>
    
    ###################### METODS SETTINGS

        public function Token($token){
            if($token != null && $token != ' ' && $token != '‎'){
                $resultado = $this->setToken($token);
                return "<strong>TOKEN:</strong> $token <br>";
            }else{
                return 'O ID do usuario esta incorreto, porfavor digite corretamente!';
                die();
            }
        }
        
        public function ID_user($id_user)
        {
            if($id_user != null && $id_user != ' ' && $id_user != '‎' ){
                $resultado = $this->setID_user($id_user);
                return "<strong>ID:</strong> $id_user <br>";
            }else{
                return 'O ID do usuario esta incorreto, porfavor digite corretamente!';
                die();
            }
        }

        public function Key_acess($key_acess)
        {
            if($key_acess != null && $key_acess != ' ' && $key_acess != '‎' ){
                $resultado = $this->setKey_acess($key_acess);
                return "<strong>KEY:</strong> $key_acess <br>";
            }else{
                return 'O ID do usuario esta incorreto, porfavor digite corretamente!';
                die();
            }
        }


        public function trazerToken()
        {
            $token = $this->getToken();
            return $token;
        }
    ##########>

    ###################### METODS ROUTINES
        public function validarToken()
        {
            $token = $this->getToken();
            $url = "https://api.tomticket.com/departamentos/$token";
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json'
                ],
            ]);

            // Executa a requisição cURL e armazena a resposta
            $response = curl_exec($curl);

            // Se houver resposta, imprime os dados
            if ($response) {
                $response_array = json_decode($response, true);
                if ($response_array['erro'] !== true) {
                    return true;
                    die();
                }
                return "Ocorreu um erro: <strong> $response_array[mensagem] </strong>";
                die();
            } else {
                // Se ocorrer um erro na requisição
                return "Erro ao fazer a requisição.";
                die();
            }

            // Fecha a sessão cURL
            curl_close($curl);
        }
        public function listChamados($pagina)
        {
            $token = $this->getToken();
            $url = "https://api.tomticket.com/chamados/$token/$pagina";
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json'
                ],
            ]);

            // Executa a requisição cURL e armazena a resposta
            $response = curl_exec($curl);
            
            // Se houver resposta, imprime os dados
            if ($response) {
                $response_array = json_decode($response, true);
                return $response_array;
                // return $response;
            } else {
                // Se ocorrer um erro na requisição
                return "Erro ao fazer a requisição.";
            }

            // Fecha a sessão cURL
            curl_close($curl);
        }

        public function listDepartamento()
        {
            $token = $this->getToken();
            $url = "https://api.tomticket.com/departamentos/$token";
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json'
                ],
            ]);

            // Executa a requisição cURL e armazena a resposta
            $response = curl_exec($curl);

            // Se houver resposta, imprime os dados
            if ($response) {
                return $response;
            } else {
                // Se ocorrer um erro na requisição
                return "Erro ao fazer a requisição.";
            }

            // Fecha a sessão cURL
            curl_close($curl);
        }

        public function listCliente($pagina)
        {
            $token = $this->getToken();
            $url = "https://api.tomticket.com/clientes/$token/$pagina";
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => [
                    'Content-type: application/json'

                ],
            ]);

            $response = curl_exec($curl);
        }
    ##########>
}
