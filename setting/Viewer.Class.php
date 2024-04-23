<?php


class Viewer
{
    ###################### PROPERTY
        protected $url;
    ###########>
    
    ###################### SET 
        private function setUrl($url)
        {
            $this->url = $url;
        }
    ###########>
    
    ###################### GET
        private function getUrl()
        {
            return $this->url;
        }
    ###########>
    
    ###################### METODS SETTINGS
        public function __construct() {
            
            $url = $_SERVER['REQUEST_URI'];
            $arryUrl = explode('/',$url);
            $totalArrayUrl = count($arryUrl);
            $indiceFinal = 0;
            for ($i=0; $i < $totalArrayUrl ; $i++) { 
                $indiceFinal++;
            }
            $indiceFinal = $indiceFinal-1;
            $routeViewerArray = $arryUrl[$indiceFinal];
            $routeViewerArray = explode('?',$routeViewerArray);
            $routeViewer = implode('', $routeViewerArray);
            $returno = $routeViewer;
            
            $this->setUrl($returno);
        }
        public  function url($url)
        {
            $ref = $url;

            $refinado = $this->refinar_valor_url($ref);
            if($refinado === null){
                $resultado = 'O valor da url e null';
            }

        }
    ##########>
    
    ###################### METODS ROUTINES
        public function refinar_valor_url($url)
        {
            $query = parse_url($url, PHP_URL_QUERY);
            parse_str($query, $query_params);
            if (isset($query_params['page'])) {
                
                $valor_page = $query_params['page'];
                $valor_refinado = trim(strip_tags($valor_page));
                return $valor_refinado;
            } else {
                return NULL;
            }
        }

        public function RotaViewer()
        {
            $ROTA = $this->getUrl();
            $callback = "erro/404";
            if($ROTA == null && $ROTA == ''){
                $ROTA = 'page/home';
            }else{
                $ROTA = explode('=',$ROTA);
                $ROTA = "$ROTA[0]/$ROTA[1]";
            }
            $this->Page($ROTA,$callback);
        }
        
        public function Page($ROTA,$callback)
        {
            $file = "view/$ROTA.Viewer.php";
            $callback = "view/$callback.Viewer.php";

            if (file_exists($file)) {
                require $file;
            }elseif(file_exists($callback)){
                require $callback;
            }else{
                echo 'Erro no sistema de rotas, o que você esta fazendo?';
                echo "<script> console.log( $file - $callback) </script>";
            }
            die();
        }


    ##########>
}
