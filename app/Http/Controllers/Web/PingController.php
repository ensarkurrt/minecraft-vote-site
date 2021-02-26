<?php

namespace App\Http\Controllers\Web;

use App\Models\Ping;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Jetstream;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

class PingController extends Controller
{
    // TODO:: Types table query from database
    public function index(Request $request)
    {
        return view('main.ping');
    }

    public function show(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'host' => ['required', 'string', 'max:100'],
        ])->validate();

        $host = $request->host;
        $port = 25565;

        require_once app_path() . '/Http/Controllers/Api/ping/ApiQuery.php';
        require_once app_path() . '/Http/Controllers/Api/ping/ApiPing.php';

        // require_once 'ping/closeTags.php';

        if (($Info = $Query->GetInfo()) !== false) {
            $hostNameHtml = str_replace("§k", "", $Info['HostName']);
            $hostNameHtml = str_replace("§l", "", $hostNameHtml);
            $hostNameHtml = str_replace("§m", "", $hostNameHtml);
            $hostNameHtml = str_replace("§n", "", $hostNameHtml);
            $hostNameHtml = str_replace("§o", "", $hostNameHtml);
            $hostNameHtml = str_replace("§r", '<font color="#">', $hostNameHtml);
            $hostNameHtml = str_replace("§0", '<font color="#000000">', $hostNameHtml);
            $hostNameHtml = str_replace("§1", '<font color="#0000AA">', $hostNameHtml);
            $hostNameHtml = str_replace("§2", '<font color="#00AA00">', $hostNameHtml);
            $hostNameHtml = str_replace("§3", '<font color="#00AAAA">', $hostNameHtml);
            $hostNameHtml = str_replace("§4", '<font color="#AA0000">', $hostNameHtml);
            $hostNameHtml = str_replace("§5", '<font color="#AA00AA">', $hostNameHtml);
            $hostNameHtml = str_replace("§6", '<font color="#FFAA00">', $hostNameHtml);
            $hostNameHtml = str_replace("§7", '<font color="#AAAAAA">', $hostNameHtml);
            $hostNameHtml = str_replace("§8", '<font color="#555555">', $hostNameHtml);
            $hostNameHtml = str_replace("§9", '<font color="#5555FF">', $hostNameHtml);
            $hostNameHtml = str_replace("§a", '<font color="#55FF55">', $hostNameHtml);
            $hostNameHtml = str_replace("§b", '<font color="#55FFFF">', $hostNameHtml);
            $hostNameHtml = str_replace("§c", '<font color="#FF5555">', $hostNameHtml);
            $hostNameHtml = str_replace("§d", '<font color="#FF55FF">', $hostNameHtml);
            $hostNameHtml = str_replace("§e", '<font color="#FFFF55">', $hostNameHtml);
            $hostNameHtml = str_replace("§f", '<font color="#FFFFFF">', $hostNameHtml);

            $cleanHostName = str_replace(array("§k", "§l", "§m", "§n", "§o", "§r", "§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f"), "", $Info['HostName']);

            if ($Info['GameName'] == 'MINECRAFT') {
                $platform = 'Minecraft: Java Edition';
            } else if ($Info['GameName'] == 'MINECRAFTPE') {
                $platform = 'Minecraft: Bedrock Edition';
            } else {
                $platform = $Info['GameName'];
            }

            $playerList = array();
            if (!empty($Query->GetPlayers())) {
                $playerList = $Query->GetPlayers();
            }

            $pluginList = array();
            if (!empty($Info['Plugins'])) {
                $pluginList = $Info['Plugins'];
            }

            $json = array(
                'status' => 'Online',
                'platform' => $platform,
                'gametype' => $Info['GameType'],
                'motd' => array(
                    'ingame' => $Info['HostName'],
                    'clean' => $cleanHostName,
                    //'html' => closeTags($hostNameHtml)
                ),
                'host' => array(
                    'host' => $host,
                    'hostip' => $Info['HostIp'],
                    'port' => $Info['HostPort']
                ),
                'players' => array(
                    'max' => $Info['MaxPlayers'],
                    'online' => $Info['Players'],
                    'list' => $playerList
                ),
                'version' => array(
                    'version' => $Info['Version'],
                    'software' => $Info['Software']
                ),
                'Plugins' => $pluginList,
                'queryinfo' => array(
                    'agreement' => 'Query',
                    'processed' => $Timer
                )
            );
        } else if ($InfoPing !== false) {
            $version = explode(" ", $InfoPing['version']['name'], 2);
            $hostNameHtml = str_replace("§k", "", $InfoPing['description']);
            $hostNameHtml = str_replace("§l", "", $hostNameHtml);
            $hostNameHtml = str_replace("§m", "", $hostNameHtml);
            $hostNameHtml = str_replace("§n", "", $hostNameHtml);
            $hostNameHtml = str_replace("§o", "", $hostNameHtml);
            $hostNameHtml = str_replace("§r", '<font color="#">', $hostNameHtml);
            $hostNameHtml = str_replace("§0", '<font color="#000000">', $hostNameHtml);
            $hostNameHtml = str_replace("§1", '<font color="#0000AA">', $hostNameHtml);
            $hostNameHtml = str_replace("§2", '<font color="#00AA00">', $hostNameHtml);
            $hostNameHtml = str_replace("§3", '<font color="#00AAAA">', $hostNameHtml);
            $hostNameHtml = str_replace("§4", '<font color="#AA0000">', $hostNameHtml);
            $hostNameHtml = str_replace("§5", '<font color="#AA00AA">', $hostNameHtml);
            $hostNameHtml = str_replace("§6", '<font color="#FFAA00">', $hostNameHtml);
            $hostNameHtml = str_replace("§7", '<font color="#AAAAAA">', $hostNameHtml);
            $hostNameHtml = str_replace("§8", '<font color="#555555">', $hostNameHtml);
            $hostNameHtml = str_replace("§9", '<font color="#5555FF">', $hostNameHtml);
            $hostNameHtml = str_replace("§a", '<font color="#55FF55">', $hostNameHtml);
            $hostNameHtml = str_replace("§b", '<font color="#55FFFF">', $hostNameHtml);
            $hostNameHtml = str_replace("§c", '<font color="#FF5555">', $hostNameHtml);
            $hostNameHtml = str_replace("§d", '<font color="#FF55FF">', $hostNameHtml);
            $hostNameHtml = str_replace("§e", '<font color="#FFFF55">', $hostNameHtml);
            $hostNameHtml = str_replace("§f", '<font color="#FFFFFF">', $hostNameHtml);

            $cleanHostName = str_replace(array("§k", "§l", "§m", "§n", "§o", "§r", "§0", "§1", "§2", "§3", "§4", "§5", "§6", "§7", "§8", "§9", "§a", "§b", "§c", "§d", "§e", "§f"), "", $InfoPing['description']);

            $json = array(
                'status' => 'Online',
                'motd' => array(
                    'ingame' => $InfoPing['description'],
                    'clean' => $cleanHostName,
                    // 'html' => closeTags($hostNameHtml)
                ),
                'host' => array(
                    'host' => $host,
                    'port' => $port
                ),
                'players' => array(
                    'max' => $InfoPing['players']['max'],
                    'online' => $InfoPing['players']['online']
                ),
                'version' => array(
                    'version' => $version[1],
                    'protocol' => $InfoPing['version']['protocol']
                ),
                'queryinfo' => array(
                    'agreement' => 'Ping',
                    'processed' => $Timer
                )
            );
        } else {
            $json = array(
                'status' => 'Offline',
                'host' => $host,
                'port' => $port
            );
        }
        $ping = new Ping();
        $ping->status = $json['status'];
        if ($ping->status == 'Online') {
            $ping->host = $json['host']['host'];
            $ping->motd = $this->parseMotd($json['motd']['clean']);
            $ping->maxPlayer = $json['players']['max'];
            $ping->onlinePlayer = $json['players']['online'];
            $ping->version = $json['version']['version'];
            $ping->protocol = $json['version']['protocol'];
        }else{
            $ping->host = $host;
        }
        return view('main.ping', compact('ping'));
    }

    public function parseMotd($arr)
    {
        if (isset($arr['extra'])) {
            if (isset($arr['extra'][0]['text'])) {
                return ltrim(rtrim($arr['extra'][0]['text']));
            }
        } else {
            return ltrim(rtrim($arr));
        }
    }
}
