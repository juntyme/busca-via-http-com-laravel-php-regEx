<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Carro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    private $link_site = 'https://www.questmultimarcas.com.br/estoque?termo=';

    public function __construct()
    {

        $this->middleware('auth');
    }
    /**
     * Home Usuário logado.
     *
     * @return view home
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Persistir no Banco de Dados
     *
     * @return bool
     */
    private function saveCar($content_array)
    {
        foreach ($content_array as $value) {
            Carro::firstOrCreate($value);
        }
    }

    /**
     *  Carregar Itens expression
     *
     * @return array
     */
    public function regexItem($item)
    {
        $user_id = Auth::user()->id;

        $reg_nome_veiculo = '/(card__title.*\"\>)(.*)\<\/a/';
        $reg_link = '/(http.\S*(?=\"\>)){1}/';
        $reg_list = '/(card-list__title.*\s*)(.*)\:.*\s*.*\s(.*)\<\/span/';

        $car_name = preg_match_all($reg_nome_veiculo, $item, $nome);
        $car_link = preg_match_all($reg_link, $item, $link);
        $car_list = preg_match_all($reg_list, $item, $list);

        $array_item = [
            'user_id' => $user_id,
            'nome_veiculo' => (!!$car_name) ? trim($nome[2][0]) : null,
            'link' => (!!$car_link) ? trim($link[0][0]) : null,
            'ano' => (!!$car_list) ? trim($list[3][0]) : null,
            'combustivel' => (!!$car_list) ? trim($list[3][2]) : null,
            'portas' => (!!$car_list) ? trim($list[3][4]) : null,
            'quilometragem' => (!!$car_list) ? trim($list[3][1]) : null,
            'cambio' => (!!$car_list) ? trim($list[3][3]) : null,
            'cor' => (!!$car_list) ? trim($list[3][5]) : null,
        ];

        return $array_item;
    }

    /**
     * Expression Regulares
     *
     * @param [type] $content_array
     * @return array
     */
    private function regexPhp($content)
    {
        $new_array = [];
        $expression = "/<article(.*\s*)+?<\/article.*>/";
        if (preg_match_all($expression, $content, $array_content)) {
            foreach ($array_content[0] as $item) {
                $new_array[] = $this->regexItem($item);
            }
        }

        return  $new_array;
    }

    /**
     *  Criação de link
     */
    private function createLink($request)
    {
        $termo = trim(str_replace(' ', '+', $request->search));
        $link = $this->link_site . $termo;
        return $link;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if (isset($request->search)) {

            $link = $this->createLink($request);

            try {
                $content = file_get_contents($link);
            } catch (Exception $e) {
                // $error = $e->getMessage();
                return back()->withError('Pesquisa indisponível no momento, tente mais tarde.');
            }

            $content_array = $this->regexPhp($content);

            if (count($content_array) > 0) {
                $this->saveCar($content_array);
            }
        }

        $result_cars = Carro::orderBy('id')->get();
        $count_cars = !empty($content_array) ? count($content_array) ?? 0 : 0;

        $compact =  $request->search ? compact('request', 'result_cars', 'count_cars') : compact('result_cars');

        return view('result', $compact);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // Não foi utilizado verificações de segurança pois é um script teste
        Carro::where('id', $request->id)->delete();

        return redirect()->route('admin.search')->with('alert', "Carro ID: {$request->id} Carro excluido do registro com sucesso.");
    }
}
