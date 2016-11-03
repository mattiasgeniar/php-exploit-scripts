<?php
/**
 * SAPE.ru - Интеллектуальная система купли-продажи ссылок
 *
 * PHP-клиент
 *
 * Вебмастеры! Не нужно ничего менять в этом файле!
 * Все настройки - через параметры при вызове кода.
 * Читайте: http://help.sape.ru/
 *
 * По всем вопросам обращайтесь на support@sape.ru
 *
 * class SAPE_base              - базовый класс
 * class SAPE_client            - класс для вывода обычных ссылок
 * class SAPE_client_context    - класс для вывода контекстных сссылок
 * class SAPE_articles          - класс для вывода статей
 *
 * @version 1.2.3 от 21.07.2014
 */

/**
 * Глобальные флаги
 */
class SAPE_globals {

    function _get_toggle_flag($name, $toggle = false) {

        static $flags = array();

        if (!isset($flags[$name])) {
            $flags[$name] = false;
        }

        if ($toggle) {
            $flags[$name] = true;
        }

        return $flags[$name];
    }

    function block_css_shown($toggle = false) {
        return $this->_get_toggle_flag('block_css_shown', $toggle);
    }

    function block_ins_beforeall_shown($toggle = false) {
        return $this->_get_toggle_flag('block_ins_beforeall_shown', $toggle);
    }

    function page_obligatory_output_shown($toggle = false) {
        return $this->_get_toggle_flag('page_obligatory_output_shown', $toggle);
    }

}

/**
 * Основной класс, выполняющий всю рутину
 */
class SAPE_base {

    var $_version = '1.2.2';

    var $_verbose = false;

    /**
     * Кодировка сайта
     * @link http://www.php.net/manual/en/function.iconv.php
     * @var string
     */
    var $_charset = '';

    var $_sape_charset = '';

    var $_server_list = array('dispenser-01.saperu.net', 'dispenser-02.saperu.net');

    /**
     * Пожалейте наш сервер :о)
     * @var int
     */
    var $_cache_lifetime = 3600;

    /**
     * Если скачать базу ссылок не удалось, то следующая попытка будет через столько секунд
     * @var int
     */
    var $_cache_reloadtime = 600;

    var $_error = '';

    var $_host = '';

    var $_request_uri = '';

    var $_multi_site = false;

    /**
     * Способ подключения к удалённому серверу [file_get_contents|curl|socket]
     * @var string
     */
    var $_fetch_remote_type = '';

    /**
     * Сколько ждать ответа
     * @var int
     */
    var $_socket_timeout = 6;

    var $_force_show_code = false;

    /**
     * Если наш робот
     * @var bool
     */
    var $_is_our_bot = false;

    var $_debug = false;

    /**
     * Регистронезависимый режим работы, использовать только на свой страх и риск
     * @var bool
     */
    var $_ignore_case = false;

    /**
     * Путь к файлу с данными
     * @var string
     */
    var $_db_file = '';

    /**
     * Откуда будем брать uri страницы: $_SERVER['REQUEST_URI'] или getenv('REQUEST_URI')
     * @var bool
     */
    var $_use_server_array = false;

    /**
     * Показывать ли код js отдельно от выводимого контента
     *
     * @var bool
     */
    var $_show_counter_separately = false;

    var $_force_update_db = false;

    var $_user_agent = '';

    function SAPE_base($options = null) {

        // Поехали :o)

        $host = '';

        if (is_array($options)) {
            if (isset($options['host'])) {
                $host = $options['host'];
            }
        } elseif (strlen($options)) {
            $host = $options;
            $options = array();
        } else {
            $options = array();
        }

        if (isset($options['use_server_array']) && $options['use_server_array'] == true) {
            $this->_use_server_array = true;
        }

        // Какой сайт?
        if (strlen($host)) {
            $this->_host = $host;
        } else {
            $this->_host = $_SERVER['HTTP_HOST'];
        }

        $this->_host = preg_replace('/^http:\/\//', '', $this->_host);
        $this->_host = preg_replace('/^www\./', '', $this->_host);

        // Какая страница?
        if (isset($options['request_uri']) && strlen($options['request_uri'])) {
            $this->_request_uri = $options['request_uri'];
        } elseif ($this->_use_server_array === false) {
            $this->_request_uri = getenv('REQUEST_URI');
        }

        if (strlen($this->_request_uri) == 0) {
            $this->_request_uri = $_SERVER['REQUEST_URI'];
        }

        // На случай, если хочется много сайтов в одной папке
        if (isset($options['multi_site']) && $options['multi_site'] == true) {
            $this->_multi_site = true;
        }

        // Выводить информацию о дебаге
        if (isset($options['debug']) && $options['debug'] == true) {
            $this->_debug = true;
        }

        // Определяем наш ли робот
        if (isset($_COOKIE['sape_cookie']) && ($_COOKIE['sape_cookie'] == _SAPE_USER)) {
            $this->_is_our_bot = true;
            if (isset($_COOKIE['sape_debug']) && ($_COOKIE['sape_debug'] == 1)) {
                $this->_debug = true;
                //для удобства дебега саппортом
                $this->_options = $options;
                $this->_server_request_uri = $this->_request_uri = $_SERVER['REQUEST_URI'];
                $this->_getenv_request_uri = getenv('REQUEST_URI');
                $this->_SAPE_USER = _SAPE_USER;
            }
            if (isset($_COOKIE['sape_updatedb']) && ($_COOKIE['sape_updatedb'] == 1)) {
                $this->_force_update_db = true;
            }
        } else {
            $this->_is_our_bot = false;
        }

        // Сообщать об ошибках
        if (isset($options['verbose']) && $options['verbose'] == true || $this->_debug) {
            $this->_verbose = true;
        }

        // Кодировка
        if (isset($options['charset']) && strlen($options['charset'])) {
            $this->_charset = $options['charset'];
        } else {
            $this->_charset = 'windows-1251';
        }

        if (isset($options['fetch_remote_type']) && strlen($options['fetch_remote_type'])) {
            $this->_fetch_remote_type = $options['fetch_remote_type'];
        }

        if (isset($options['socket_timeout']) && is_numeric($options['socket_timeout']) && $options['socket_timeout'] > 0) {
            $this->_socket_timeout = $options['socket_timeout'];
        }

        // Всегда выводить чек-код
        if (isset($options['force_show_code']) && $options['force_show_code'] == true) {
            $this->_force_show_code = true;
        }

        if (!defined('_SAPE_USER')) {
            return $this->raise_error('Не задана константа _SAPE_USER');
        }

        //Не обращаем внимания на регистр ссылок
        if (isset($options['ignore_case']) && $options['ignore_case'] == true) {
            $this->_ignore_case = true;
            $this->_request_uri = strtolower($this->_request_uri);
        }

        if (isset($options['show_counter_separately'])) {
            $this->_show_counter_separately = (bool)$options['show_counter_separately'];
        }
    }

    /**
     * Получить строку User-Agent
     *
     * @return string
     */
    function _get_full_user_agent_string()
    {
        return $this->_user_agent . ' ' . $this->_version;
    }

    /**
     * Вывести дебаг-информацию
     *
     * @param $data
     * @return string
     */
    function _debug_output($data)
    {
        $data = '<!-- <sape_debug_info>' . @base64_encode(serialize($data)) . '</sape_debug_info> -->';
        return $data;
    }

    /**
     * Функция для подключения к удалённому серверу
     */
    function fetch_remote_file($host, $path, $specifyCharset = false) {

        $user_agent = $this->_get_full_user_agent_string();

        @ini_set('allow_url_fopen', 1);
        @ini_set('default_socket_timeout', $this->_socket_timeout);
        @ini_set('user_agent', $user_agent);
        if (
                $this->_fetch_remote_type == 'file_get_contents'
                ||
                (
                        $this->_fetch_remote_type == ''
                        &&
                        function_exists('file_get_contents')
                        &&
                        ini_get('allow_url_fopen') == 1
                )
        ) {
            $this->_fetch_remote_type = 'file_get_contents';

            if($specifyCharset && function_exists('stream_context_create')) {
                $opts = array(
                    'http' => array(
                    'method' => 'GET',
                    'header' => 'Accept-Charset: '. $this->_charset. "\r\n"
                  )
                );
                $context = @stream_context_create($opts);
                if ($data = @file_get_contents('http://' . $host . $path, null, $context)) {
                    return $data;
                }
            } else {
                if ($data = @file_get_contents('http://' . $host . $path)) {
                    return $data;
                }
            }

        } elseif (
                $this->_fetch_remote_type == 'curl'
                ||
                (
                        $this->_fetch_remote_type == ''
                        &&
                        function_exists('curl_init')
                )
        ) {
            $this->_fetch_remote_type = 'curl';
            if ($ch = @curl_init()) {

                @curl_setopt($ch, CURLOPT_URL, 'http://' . $host . $path);
                @curl_setopt($ch, CURLOPT_HEADER, false);
                @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                @curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->_socket_timeout);
                @curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);
                if($specifyCharset) {
                    @curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Charset: '. $this->_charset));
                }

                $data = @curl_exec($ch);
                @curl_close($ch);

                if ($data) {
                    return $data;
                }
            }

        } else {
            $this->_fetch_remote_type = 'socket';
            $buff = '';
            $fp = @fsockopen($host, 80, $errno, $errstr, $this->_socket_timeout);
            if ($fp) {
                @fputs($fp, "GET {$path} HTTP/1.0\r\nHost: {$host}\r\n");
                if($specifyCharset) {
                    @fputs($fp, "Accept-Charset: {$this->_charset}\r\n");
                }
                @fputs($fp, "User-Agent: {$user_agent}\r\n\r\n");
                while (!@feof($fp)) {
                    $buff .= @fgets($fp, 128);
                }
                @fclose($fp);

                $page = explode("\r\n\r\n", $buff);
                unset($page[0]);
                return implode("\r\n\r\n", $page);
            }

        }

        return $this->raise_error('Не могу подключиться к серверу: ' . $host . $path . ', type: ' . $this->_fetch_remote_type);
    }

    /**
     * Функция чтения из локального файла
     */
    function _read($filename) {

        $fp = @fopen($filename, 'rb');
        @flock($fp, LOCK_SH);
        if ($fp) {
            clearstatcache();
            $length = @filesize($filename);

            if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                $mqr = @get_magic_quotes_runtime();
                @set_magic_quotes_runtime(0);
            }

            if ($length) {
                $data = @fread($fp, $length);
            } else {
                $data = '';
            }

            if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                @set_magic_quotes_runtime($mqr);
            }

            @flock($fp, LOCK_UN);
            @fclose($fp);

            return $data;
        }

        return $this->raise_error('Не могу считать данные из файла: ' . $filename);
    }

    /**
     * Функция записи в локальный файл
     */
    function _write($filename, $data) {

        $fp = @fopen($filename, 'ab');
        if ($fp) {
            if (flock($fp, LOCK_EX | LOCK_NB)) {
                ftruncate($fp, 0);

                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                    $mqr = @get_magic_quotes_runtime();
                    @set_magic_quotes_runtime(0);
                }

                @fwrite($fp, $data);

                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                    @set_magic_quotes_runtime($mqr);
                }

                @flock($fp, LOCK_UN);
                @fclose($fp);

                if (md5($this->_read($filename)) != md5($data)) {
                    @unlink($filename);
                    return $this->raise_error('Нарушена целостность данных при записи в файл: ' . $filename);
                }
            } else {
                return false;
            }

            return true;
        }

        return $this->raise_error('Не могу записать данные в файл: ' . $filename);
    }

    /**
     * Функция обработки ошибок
     */
    function raise_error($e) {

        $this->_error = '<p style="color: red; font-weight: bold;">SAPE ERROR: ' . $e . '</p>';

        if ($this->_verbose == true) {
            print $this->_error;
        }

        return false;
    }

    /**
     * Получить имя файла с даными
     *
     * @return string
     */
    function _get_db_file() {
        return '';
    }

    /**
     * Получить URI к хосту диспенсера
     *
     * @return string
     */
    function _get_dispenser_path() {
        return '';
    }

    /**
     * Сохранить данные, полученные из файла, в объекте
     */
    function set_data($data) {
    }

    /**
     * Загрузка данных
     */
    function load_data() {
        $this->_db_file = $this->_get_db_file();

        if (!is_file($this->_db_file)) {
            // Пытаемся создать файл.
            if (@touch($this->_db_file)) {
                @chmod($this->_db_file, 0666); // Права доступа
            } else {
                return $this->raise_error('Нет файла ' . $this->_db_file . '. Создать не удалось. Выставите права 777 на папку.');
            }
        }

        if (!is_writable($this->_db_file)) {
            return $this->raise_error('Нет доступа на запись к файлу: ' . $this->_db_file . '! Выставите права 777 на папку.');
        }

        @clearstatcache();

        $data = $this->_read($this->_db_file);
        if (
                $this->_force_update_db
                || (
                        !$this->_is_our_bot
                        &&
                        (
                                filemtime($this->_db_file) < (time() - $this->_cache_lifetime)
                                ||
                                filesize($this->_db_file) == 0
                                ||
                                @unserialize($data) == false
                        )
                )
        ) {
            // Чтобы не повесить площадку клиента и чтобы не было одновременных запросов
            @touch($this->_db_file, (time() - $this->_cache_lifetime + $this->_cache_reloadtime));

            $path = $this->_get_dispenser_path();
            if (strlen($this->_charset)) {
                $path .= '&charset=' . $this->_charset;
            }

            foreach ($this->_server_list as $server) {
                if ($data = $this->fetch_remote_file($server, $path)) {
                    if (substr($data, 0, 12) == 'FATAL ERROR:') {
                        $this->raise_error($data);
                    } else {
                        // [псевдо]проверка целостности:
                        $hash = @unserialize($data);
                        if ($hash != false) {
                            // попытаемся записать кодировку в кеш
                            $hash['__sape_charset__'] = $this->_charset;
                            $hash['__last_update__'] = time();
                            $hash['__multi_site__'] = $this->_multi_site;
                            $hash['__fetch_remote_type__'] = $this->_fetch_remote_type;
                            $hash['__ignore_case__'] = $this->_ignore_case;
                            $hash['__php_version__'] = phpversion();
                            $hash['__server_software__'] = $_SERVER['SERVER_SOFTWARE'];

                            $data_new = @serialize($hash);
                            if ($data_new) {
                                $data = $data_new;
                            }

                            $this->_write($this->_db_file, $data);
                            break;
                        }
                    }
                }
            }
        }

        // Убиваем PHPSESSID
        if (strlen(session_id())) {
            $session = session_name() . '=' . session_id();
            $this->_request_uri = str_replace(array('?' . $session, '&' . $session), '', $this->_request_uri);
        }

        $this->set_data(@unserialize($data));

        return true;
    }

    function _return_obligatory_page_content()
    {
        $s_globals = new SAPE_globals();

        $html = '';
        if (isset($this->_page_obligatory_output) && !empty($this->_page_obligatory_output)
            && false == $s_globals->page_obligatory_output_shown()) {
            $s_globals->page_obligatory_output_shown(true);
            $html = $this->_page_obligatory_output;
        }

        return $html;
    }

    /**
     * Вернуть js-код
     * - работает только когда параметр конструктора show_counter_separately = true
     *
     * @return string
     */
    function return_counter()
    {
        //если show_counter_separately = false и выполнен вызов этого метода,
        //то заблокировать вывод js-кода вместе с контентом
        if (false == $this->_show_counter_separately) {
            $this->_show_counter_separately = true;
        }

        return $this->_return_obligatory_page_content();
    }
}

/**
 * Класс для работы с обычными ссылками
 */
class SAPE_client extends SAPE_base {

    var $_links_delimiter = '';
    var $_links = array();
    var $_links_page = array();
    var $_user_agent = 'SAPE_Client PHP';

    var $_show_only_block = false;
    var $_block_tpl = '';
    var $_block_tpl_options = array();
    var $_block_uri_idna = array();

    function SAPE_client($options = null) {
        parent::SAPE_base($options);

        $this->load_data();
    }

    /**
     * Обработка html для массива ссылок
     *
     * @param string $html
     * @param null|array $options
     * @return string
     */
    function _return_array_links_html($html, $options = null) {

        if(empty($options)) {
            $options = array();
        }

        // если запрошена определенная кодировка, и известна кодировка кеша, и они разные, конвертируем в заданную
        if (
                strlen($this->_charset) > 0
                &&
                strlen($this->_sape_charset) > 0
                &&
                $this->_sape_charset != $this->_charset
                &&
                function_exists('iconv')
        ) {
            $new_html = @iconv($this->_sape_charset, $this->_charset, $html);
            if ($new_html) {
                $html = $new_html;
            }
        }

        if ($this->_is_our_bot) {

            $html = '<sape_noindex>' . $html . '</sape_noindex>';

            if(isset($options['is_block_links']) && true == $options['is_block_links']) {

                if(!isset($options['nof_links_requested'])) {
                    $options['nof_links_requested'] = 0;
                }
                if(!isset($options['nof_links_displayed'])) {
                    $options['nof_links_displayed'] = 0;
                }
                if(!isset($options['nof_obligatory'])) {
                    $options['nof_obligatory'] = 0;
                }
                if(!isset($options['nof_conditional'])) {
                    $options['nof_conditional'] = 0;
                }

                $html = '<sape_block nof_req="' . $options['nof_links_requested'] .
                            '" nof_displ="' . $options['nof_links_displayed'] .
                            '" nof_oblig="' . $options['nof_obligatory'] .
                            '" nof_cond="' . $options['nof_conditional'] .
                            '">' . $html .
                        '</sape_block>';
            }
        }

        return $html;
    }

    /**
     * Финальная обработка html перед выводом ссылок
     *
     * @param string $html
     * @return string
     */
    function _return_html($html) {

        if (false == $this->_show_counter_separately) {
            $html = $this->_return_obligatory_page_content() . $html;
        }

        if ($this->_debug) {
            $user_agent = $this->_get_full_user_agent_string();

            $html .= $this->_debug_output($user_agent);
            $html .= $this->_debug_output($this);
        }

        return $html;
    }

    /**
     * Вывод ссылок в виде блока
     *
     * - Примечание: начиная с версии 1.2.2 второй аргумент $offset убран. Если
     * передавать его согласно старой сигнатуре, то он будет проигнорирован.
     *
     * @param int $n Количествово ссылок, которые нужно вывести в текущем блоке
     * @param array $options Опции
     *
     * <code>
     * $options = array();
     * $options['block_no_css'] = (false|true);
     * // Переопределяет запрет на вывод css в коде страницы: false - выводить css
     * $options['block_orientation'] = (1|0);
     * // Переопределяет ориентацию блока: 1 - горизонтальная, 0 - вертикальная
     * $options['block_width'] = ('auto'|'[?]px'|'[?]%'|'[?]');
     * // Переопределяет ширину блока:
     * // 'auto'  - определяется шириной блока-предка с фиксированной шириной,
     * // если такового нет, то займет всю ширину
     * // '[?]px' - значение в пикселях
     * // '[?]%'  - значение в процентах от ширины блока-предка с фиксированной шириной
     * // '[?]'   - любое другое значение, которое поддерживается спецификацией CSS
     * </code>
     *
     * @see return_links()
     * @see return_counter()
     *
     * @return string
     */
    function return_block_links($n = null, $options = null) {

        $numargs = func_num_args();
        $args    = func_get_args();

        //Проверяем аргументы для старой сигнатуры вызова
        if (2 == $numargs) {           // return_links($n, $options)
            if (!is_array($args[1])) { // return_links($n, $offset) - deprecated!
                $options = null;
            }
        }
        elseif (2 < $numargs) { // return_links($n, $offset, $options) - deprecated!

            if (!is_array($options)) {
                $options = $args[2];
            }
        }

        // Объединить параметры
        if (empty($options)) {
            $options = array();
        }

        $defaults                      = array();
        $defaults['block_no_css']      = false;
        $defaults['block_orientation'] = 1;
        $defaults['block_width']       = '';

        $ext_options = array();
        if (isset($this->_block_tpl_options) && is_array($this->_block_tpl_options)) {
            $ext_options = $this->_block_tpl_options;
        }

        $options = array_merge($defaults, $ext_options, $options);

        // Ссылки переданы не массивом (чек-код) => выводим как есть + инфо о блоке
        if (!is_array($this->_links_page)) {
            $html = $this->_return_array_links_html('', array('is_block_links' => true));

            return $this->_return_html($this->_links_page . $html);
        }
        // Не переданы шаблоны => нельзя вывести блоком - ничего не делать
        elseif (!isset($this->_block_tpl)) {
            return $this->_return_html('');
        }

        // Определим нужное число элементов в блоке

        $total_page_links = count($this->_links_page);

        $need_show_obligatory_block  = false;
        $need_show_conditional_block = false;
        $n_requested                 = 0;

        if (isset($this->_block_ins_itemobligatory)) {
            $need_show_obligatory_block = true;
        }

        if (is_numeric($n) && $n >= $total_page_links) {

            $n_requested = $n;

            if (isset($this->_block_ins_itemconditional)) {
                $need_show_conditional_block = true;
            }
        }

        if (!is_numeric($n) || $n > $total_page_links) {
            $n = $total_page_links;
        }

        // Выборка ссылок
        $links = array();
        for ($i = 1; $i <= $n; $i++) {
            $links[] = array_shift($this->_links_page);
        }

        $html = '';

        // Подсчет числа опциональных блоков
        $nof_conditional = 0;
        if (count($links) < $n_requested && true == $need_show_conditional_block) {
            $nof_conditional = $n_requested - count($links);
        }

        //Если нет ссылок и нет вставных блоков, то ничего не выводим
        if (empty($links) && $need_show_obligatory_block == false && $nof_conditional == 0) {

            $return_links_options = array(
                'is_block_links'      => true,
                'nof_links_requested' => $n_requested,
                'nof_links_displayed' => 0,
                'nof_obligatory'      => 0,
                'nof_conditional'     => 0
            );

            $html = $this->_return_array_links_html($html, $return_links_options);

            return $this->_return_html($html);
        }

        // Делаем вывод стилей, только один раз. Или не выводим их вообще, если так задано в параметрах
        $s_globals = new SAPE_globals();
        if (!$s_globals->block_css_shown() && false == $options['block_no_css']) {
            $html .= $this->_block_tpl['css'];
            $s_globals->block_css_shown(true);
        }

        // Вставной блок в начале всех блоков
        if (isset($this->_block_ins_beforeall) && !$s_globals->block_ins_beforeall_shown()) {
            $html .= $this->_block_ins_beforeall;
            $s_globals->block_ins_beforeall_shown(true);
        }
        unset($s_globals);

        // Вставной блок в начале блока
        if (isset($this->_block_ins_beforeblock)) {
            $html .= $this->_block_ins_beforeblock;
        }

        // Получаем шаблоны в зависимости от ориентации блока
        $block_tpl_parts = $this->_block_tpl[$options['block_orientation']];

        $block_tpl          = $block_tpl_parts['block'];
        $item_tpl           = $block_tpl_parts['item'];
        $item_container_tpl = $block_tpl_parts['item_container'];
        $item_tpl_full      = str_replace('{item}', $item_tpl, $item_container_tpl);
        $items              = '';

        $nof_items_total = count($links);
        foreach ($links as $link) {

            preg_match('#<a href="(https?://([^"/]+)[^"]*)"[^>]*>[\s]*([^<]+)</a>#i', $link, $link_item);

            if (function_exists('mb_strtoupper') && strlen($this->_sape_charset) > 0) {
                $header_rest         = mb_substr($link_item[3], 1, mb_strlen($link_item[3], $this->_sape_charset) - 1, $this->_sape_charset);
                $header_first_letter = mb_strtoupper(mb_substr($link_item[3], 0, 1, $this->_sape_charset), $this->_sape_charset);
                $link_item[3]        = $header_first_letter . $header_rest;
            }
            elseif (function_exists('ucfirst') && (strlen($this->_sape_charset) == 0 || strpos($this->_sape_charset, '1251') !== false)) {
                $link_item[3][0] = ucfirst($link_item[3][0]);
            }

            // Если есть раскодированный URL, то заменить его при выводе
            if (isset($this->_block_uri_idna) && isset($this->_block_uri_idna[$link_item[2]])) {
                $link_item[2] = $this->_block_uri_idna[$link_item[2]];
            }

            $item = $item_tpl_full;
            $item = str_replace('{header}', $link_item[3], $item);
            $item = str_replace('{text}', trim($link), $item);
            $item = str_replace('{url}', $link_item[2], $item);
            $item = str_replace('{link}', $link_item[1], $item);
            $items .= $item;
        }

        // Вставной обязатльный элемент в блоке
        if (true == $need_show_obligatory_block) {
            $items .= str_replace('{item}', $this->_block_ins_itemobligatory, $item_container_tpl);
            $nof_items_total += 1;
        }

        // Вставные опциональные элементы в блоке
        if ($need_show_conditional_block == true && $nof_conditional > 0) {
            for ($i = 0; $i < $nof_conditional; $i++) {
                $items .= str_replace('{item}', $this->_block_ins_itemconditional, $item_container_tpl);
            }
            $nof_items_total += $nof_conditional;
        }

        if ($items != '') {
            $html .= str_replace('{items}', $items, $block_tpl);

            // Проставляем ширину, чтобы везде одинковая была
            if ($nof_items_total > 0) {
                $html = str_replace('{td_width}', round(100 / $nof_items_total), $html);
            }
            else {
                $html = str_replace('{td_width}', 0, $html);
            }

            // Если задано, то переопределить ширину блока
            if (isset($options['block_width']) && !empty($options['block_width'])) {
                $html = str_replace('{block_style_custom}', 'style="width: ' . $options['block_width'] . '!important;"', $html);
            }
        }

        unset($block_tpl_parts, $block_tpl, $items, $item, $item_tpl, $item_container_tpl);

        // Вставной блок в конце блока
        if (isset($this->_block_ins_afterblock)) {
            $html .= $this->_block_ins_afterblock;
        }

        //Заполняем оставшиеся модификаторы значениями
        unset($options['block_no_css'], $options['block_orientation'], $options['block_width']);

        $tpl_modifiers = array_keys($options);
        foreach ($tpl_modifiers as $k => $m) {
            $tpl_modifiers[$k] = '{' . $m . '}';
        }
        unset($m, $k);

        $tpl_modifiers_values = array_values($options);

        $html = str_replace($tpl_modifiers, $tpl_modifiers_values, $html);
        unset($tpl_modifiers, $tpl_modifiers_values);

        //Очищаем незаполненные модификаторы
        $clear_modifiers_regexp = '#\{[a-z\d_\-]+\}#';
        $html                   = preg_replace($clear_modifiers_regexp, ' ', $html);

        $return_links_options = array(
            'is_block_links'      => true,
            'nof_links_requested' => $n_requested,
            'nof_links_displayed' => $n,
            'nof_obligatory'      => ($need_show_obligatory_block == true ? 1 : 0),
            'nof_conditional'     => $nof_conditional
        );

        $html = $this->_return_array_links_html($html, $return_links_options);

        return $this->_return_html($html);
    }

    /**
     * Вывод ссылок в обычном виде - текст с разделителем
     *
     * - Примечание: начиная с версии 1.2.2 второй аргумент $offset убран. Если
     * передавать его согласно старой сигнатуре, то он будет проигнорирован.
     *
     * @param int $n Количествово ссылок, которые нужно вывести
     * @param array $options Опции
     *
     * <code>
     * $options = array();
     * $options['as_block'] = (false|true);
     * // Показывать ли ссылки в виде блока
     * </code>
     *
     * @see return_block_links()
     * @see return_counter()
     *
     * @return string
     */
    function return_links($n = null, $options = null) {

        $numargs = func_num_args();
        $args    = func_get_args();

        //Проверяем аргументы для старой сигнатуры вызова
        if (2 == $numargs) {           // return_links($n, $options)
            if (!is_array($args[1])) { // return_links($n, $offset) - deprecated!
                $options = null;
            }
        }
        elseif (2 < $numargs) {        // return_links($n, $offset, $options) - deprecated!

            if (!is_array($options)) {
                $options = $args[2];
            }
        }

        //Опрелелить, как выводить ссылки
        $as_block = $this->_show_only_block;

        if (is_array($options) && isset($options['as_block']) && false == $as_block) {
            $as_block = $options['as_block'];
        }

        if (true == $as_block && isset($this->_block_tpl)) {
            return $this->return_block_links($n, $options);
        }

        //-------

        if (is_array($this->_links_page)) {

            $total_page_links = count($this->_links_page);

            if (!is_numeric($n) || $n > $total_page_links) {
                $n = $total_page_links;
            }

            $links = array();

            for ($i = 1; $i <= $n; $i++) {
                $links[] = array_shift($this->_links_page);
            }

            $html = join($this->_links_delimiter, $links);

            // если запрошена определенная кодировка, и известна кодировка кеша, и они разные, конвертируем в заданную
            if (strlen($this->_charset) > 0
                && strlen($this->_sape_charset) > 0
                && $this->_sape_charset != $this->_charset
                && function_exists('iconv')
            ) {
                $new_html = @iconv($this->_sape_charset, $this->_charset, $html);
                if ($new_html) {
                    $html = $new_html;
                }
            }

            if ($this->_is_our_bot) {
                $html = '<sape_noindex>' . $html . '</sape_noindex>';
            }
        }
        else {
            $html = $this->_links_page;
            if ($this->_is_our_bot) {
                $html .= '<sape_noindex></sape_noindex>';
            }
        }

        $html = $this->_return_html($html);

        return $html;
    }

    function _get_db_file() {
        if ($this->_multi_site) {
            return dirname(__FILE__) . '/' . $this->_host . '.links.db';
        } else {
            return dirname(__FILE__) . '/links.db';
        }
    }

    function _get_dispenser_path() {
        return '/code.php?user=' . _SAPE_USER . '&host=' . $this->_host;
    }

    function set_data($data) {
        if ($this->_ignore_case) {
            $this->_links = array_change_key_case($data);
        } else {
            $this->_links = $data;
        }
        if (isset($this->_links['__sape_delimiter__'])) {
            $this->_links_delimiter = $this->_links['__sape_delimiter__'];
        }
        // определяем кодировку кеша
        if (isset($this->_links['__sape_charset__'])) {
            $this->_sape_charset = $this->_links['__sape_charset__'];
        } else {
            $this->_sape_charset = '';
        }
        if (@array_key_exists($this->_request_uri, $this->_links) && is_array($this->_links[$this->_request_uri])) {
            $this->_links_page = $this->_links[$this->_request_uri];
        } else {
            if (isset($this->_links['__sape_new_url__']) && strlen($this->_links['__sape_new_url__'])) {
                if ($this->_is_our_bot || $this->_force_show_code) {
                    $this->_links_page = $this->_links['__sape_new_url__'];
                }
            }
        }

        //Есть ли обязательный вывод
        if (isset($this->_links['__sape_page_obligatory_output__'])) {
            $this->_page_obligatory_output = $this->_links['__sape_page_obligatory_output__'];
        }

        // Есть ли флаг блочных ссылок
        if (isset($this->_links['__sape_show_only_block__'])) {
            $this->_show_only_block = $this->_links['__sape_show_only_block__'];
        }
        else {
            $this->_show_only_block = false;
        }

        // Есть ли шаблон для красивых ссылок
        if (isset($this->_links['__sape_block_tpl__']) && !empty($this->_links['__sape_block_tpl__'])
                && is_array($this->_links['__sape_block_tpl__'])){
            $this->_block_tpl = $this->_links['__sape_block_tpl__'];
        }

        // Есть ли параметры для красивых ссылок
        if (isset($this->_links['__sape_block_tpl_options__']) && !empty($this->_links['__sape_block_tpl_options__'])
                && is_array($this->_links['__sape_block_tpl_options__'])){
            $this->_block_tpl_options = $this->_links['__sape_block_tpl_options__'];
        }

        // IDNA-домены
        if (isset($this->_links['__sape_block_uri_idna__']) && !empty($this->_links['__sape_block_uri_idna__'])
                && is_array($this->_links['__sape_block_uri_idna__'])){
            $this->_block_uri_idna = $this->_links['__sape_block_uri_idna__'];
        }

        // Блоки
        $check_blocks = array(
            'beforeall',
            'beforeblock',
            'afterblock',
            'itemobligatory',
            'itemconditional',
            'afterall'
        );

        foreach($check_blocks as $block_name) {

            $var_name = '__sape_block_ins_' . $block_name . '__';
            $prop_name = '_block_ins_' . $block_name;

            if (isset($this->_links[$var_name]) && strlen($this->_links[$var_name]) > 0) {
                $this->$prop_name = $this->_links[$var_name];
            }

        }
    }
}

/**
 * Класс для работы с контекстными ссылками
 */
class SAPE_context extends SAPE_base {

    var $_words = array();
    var $_words_page = array();
    var $_user_agent = 'SAPE_Context PHP';
    var $_filter_tags = array('a', 'textarea', 'select', 'script', 'style', 'label', 'noscript', 'noindex', 'button');

    var $_debug_actions = array();

    function SAPE_context($options = null) {
        parent::SAPE_base($options);
        $this->load_data();
    }

    /**
     * Начать сбор дебаг-информации
     */
    function _debug_action_start() {
        if (!$this->_debug) {
            return;
        }

        $this->_debug_actions = array();
        $this->_debug_actions[] = $this->_get_full_user_agent_string();
    }

    /**
     * Записать строку дебаг-информацию
     *
     * @param $data
     * @param string $key
     */
    function _debug_action_append($data, $key = '') {
        if (!$this->_debug) {
            return;
        }

        if (!empty($key)) {
            $this->_debug_actions[] = array($key => $data);
        }
        else {
            $this->_debug_actions[] = $data;
        }
    }

    /**
     * Вывод дебаг-информации
     *
     * @return string
     */
    function _debug_action_output() {

        if (!$this->_debug || empty($this->_debug_actions)) {
            return '';
        }

        $debug_info = $this->_debug_output($this->_debug_actions);

        $this->_debug_actions = array();

        return $debug_info;
    }

    /**
     * Замена слов в куске текста и обрамляет его тегами sape_index
     */
    function replace_in_text_segment($text) {

        $this->_debug_action_start();
        $this->_debug_action_append('START: replace_in_text_segment()');
        $this->_debug_action_append($text, 'argument for replace_in_text_segment');

        if (count($this->_words_page) > 0) {

            $source_sentences = array();

            //Создаем массив исходных текстов для замены
            foreach ($this->_words_page as $n => $sentence) {
                //Заменяем все сущности на символы
                $special_chars = array(
                    '&amp;'     => '&',
                    '&quot;'    => '"',
                    '&#039;'    => '\'',
                    '&lt;'      => '<',
                    '&gt;'      => '>'
                );
                $sentence = strip_tags($sentence);
                $sentence = strip_tags($sentence);
                $sentence = str_replace(array_keys($special_chars), array_values($special_chars), $sentence);

                //Преобразуем все спец символы в сущности
                $htsc_charset = empty($this->_charset) ? 'windows-1251' : $this->_charset;
                $quote_style = ENT_COMPAT;
                if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
                    $quote_style = ENT_COMPAT|ENT_HTML401;
                }

                $sentence = htmlspecialchars($sentence, $quote_style, $htsc_charset);

                //Квотируем
                $sentence = preg_quote($sentence, '/');
                $replace_array = array();
                if (preg_match_all('/(&[#a-zA-Z0-9]{2,6};)/isU', $sentence, $out)) {
                    for ($i = 0; $i < count($out[1]); $i++) {
                        $unspec = $special_chars[$out[1][$i]];
                        $real = $out[1][$i];
                        $replace_array[$unspec] = $real;
                    }
                }
                //Заменяем сущности на ИЛИ (сущность|символ)
                foreach ($replace_array as $unspec => $real) {
                    $sentence = str_replace($real, '((' . $real . ')|(' . $unspec . '))', $sentence);
                }
                //Заменяем пробелы на переносы или сущности пробелов
                $source_sentences[$n] = str_replace(' ', '((\s)|(&nbsp;))+', $sentence);
            }

            $this->_debug_action_append($source_sentences, 'sentences for replace');

            //если это первый кусок, то не будем добавлять <
            $first_part = true;
            //пустая переменная для записи

            if (count($source_sentences) > 0) {

                $content = '';
                $open_tags = array(); //Открытые забаненые тэги
                $close_tag = ''; //Название текущего закрывающего тэга

                //Разбиваем по символу начала тега
                $part = strtok(' ' . $text, '<');

                while ($part !== false) {
                    //Определяем название тэга
                    if (preg_match('/(?si)^(\/?[a-z0-9]+)/', $part, $matches)) {
                        //Определяем название тега
                        $tag_name = strtolower($matches[1]);
                        //Определяем закрывающий ли тэг
                        if (substr($tag_name, 0, 1) == '/') {
                            $close_tag = substr($tag_name, 1);
                            $this->_debug_action_append($close_tag, 'close tag');
                        }
                        else {
                            $close_tag = '';
                            $this->_debug_action_append($tag_name, 'open tag');
                        }
                        $cnt_tags = count($open_tags);
                        //Если закрывающий тег совпадает с тегом в стеке открытых запрещенных тегов
                        if (($cnt_tags > 0) && ($open_tags[$cnt_tags - 1] == $close_tag)) {
                            array_pop($open_tags);

                            $this->_debug_action_append($tag_name, 'deleted from open_tags');

                            if ($cnt_tags - 1 == 0) {
                                $this->_debug_action_append('start replacement');
                            }
                        }

                        //Если нет открытых плохих тегов, то обрабатываем
                        if (count($open_tags) == 0) {
                            //если не запрещенный тэг, то начинаем обработку
                            if (!in_array($tag_name, $this->_filter_tags)) {
                                $split_parts = explode('>', $part, 2);
                                //Перестраховываемся
                                if (count($split_parts) == 2) {
                                    //Начинаем перебор фраз для замены
                                    foreach ($source_sentences as $n => $sentence) {
                                        if (preg_match('/' . $sentence . '/', $split_parts[1]) == 1) {
                                            $split_parts[1] = preg_replace('/' . $sentence . '/', str_replace('$', '\$', $this->_words_page[$n]), $split_parts[1], 1);

                                            $this->_debug_action_append($sentence . ' --- ' . $this->_words_page[$n], 'replaced');

                                            //Если заменили, то удаляем строчку из списка замены
                                            unset($source_sentences[$n]);
                                            unset($this->_words_page[$n]);
                                        }
                                    }
                                    $part = $split_parts[0] . '>' . $split_parts[1];
                                    unset($split_parts);
                                }
                            } else {
                                //Если у нас запрещеный тэг, то помещаем его в стек открытых
                                $open_tags[] = $tag_name;

                                $this->_debug_action_append($tag_name, 'added to open_tags, stop replacement');
                            }
                        }
                    } else {
                        //Если нет названия тега, то считаем, что перед нами текст
                        foreach ($source_sentences as $n => $sentence) {
                            if (preg_match('/' . $sentence . '/', $part) == 1) {
                                $part = preg_replace('/' . $sentence . '/', str_replace('$', '\$', $this->_words_page[$n]), $part, 1);

                                $this->_debug_action_append($sentence . ' --- ' . $this->_words_page[$n], 'replaced');

                                //Если заменили, то удаляем строчку из списка замены,
                                //чтобы было можно делать множественный вызов
                                unset($source_sentences[$n]);
                                unset($this->_words_page[$n]);
                            }
                        }
                    }

                    //Если это первая часть, то не выводим <
                    if ($first_part) {
                        $content .= $part;
                        $first_part = false;
                    }
                    else {
                        $content .= '<' . $part;
                    }
                    //Получаем следующу часть
                    unset($part);
                    $part = strtok('<');
                }
                $text = ltrim($content);
                unset($content);
            }
        }
        else {
             $this->_debug_action_append('No word\'s for page');
        }

        if ($this->_is_our_bot || $this->_force_show_code || $this->_debug) {
            $text = '<sape_index>' . $text . '</sape_index>';
            if (isset($this->_words['__sape_new_url__']) && strlen($this->_words['__sape_new_url__'])) {
                $text .= $this->_words['__sape_new_url__'];
            }
        }

        if (count($this->_words_page) > 0) {
            $this->_debug_action_append($this->_words_page, 'Not replaced');
        }

        $this->_debug_action_append('END: replace_in_text_segment()');

        $text .= $this->_debug_action_output();

        return $text;
    }

    /**
     * Замена слов
     */
    function replace_in_page(&$buffer) {

        $this->_debug_action_start();
        $this->_debug_action_append('START: replace_in_page()');

        $s_globals = new SAPE_globals();

        if (!$s_globals->page_obligatory_output_shown()
            && isset($this->_page_obligatory_output)
            && !empty($this->_page_obligatory_output)) {

            $split_content = preg_split('/(?smi)(<\/?body[^>]*>)/', $buffer, -1, PREG_SPLIT_DELIM_CAPTURE);
            if (count($split_content) == 5) {
                $buffer = $split_content[0] . $split_content[1] . $split_content[2]
                    . (false == $this->_show_counter_separately ? $this->_return_obligatory_page_content() : '')
                    . $split_content[3] . $split_content[4];
                unset($split_content);

                $s_globals->page_obligatory_output_shown(true);
            }
        }

        if (count($this->_words_page) > 0) {
            //разбиваем строку по sape_index
            //Проверяем есть ли теги sape_index
            $split_content = preg_split('/(?smi)(<\/?sape_index>)/', $buffer, -1);
            $cnt_parts = count($split_content);
            if ($cnt_parts > 1) {
                //Если есть хоть одна пара sape_index, то начинаем работу
                if ($cnt_parts >= 3) {
                    for ($i = 1; $i < $cnt_parts; $i = $i + 2) {
                        $split_content[$i] = $this->replace_in_text_segment($split_content[$i]);
                    }
                }
                $buffer = implode('', $split_content);

                $this->_debug_action_append($cnt_parts, 'Split by Sape_index cnt_parts=');

            } else {
                //Если не нашли sape_index, то пробуем разбить по BODY
                $split_content = preg_split('/(?smi)(<\/?body[^>]*>)/', $buffer, -1, PREG_SPLIT_DELIM_CAPTURE);
                //Если нашли содержимое между body
                if (count($split_content) == 5) {
                    $split_content[0] = $split_content[0] . $split_content[1];
                    $split_content[1] = $this->replace_in_text_segment($split_content[2]);
                    $split_content[2] = $split_content[3] . $split_content[4];
                    unset($split_content[3]);
                    unset($split_content[4]);
                    $buffer = $split_content[0] . $split_content[1] . $split_content[2];

                    $this->_debug_action_append('Split by BODY');
                } else {
                    //Если не нашли sape_index и не смогли разбить по body
                    $this->_debug_action_append('Cannot split by BODY');
                }
            }

        } else {
            if (!$this->_is_our_bot && !$this->_force_show_code && !$this->_debug) {
                $buffer = preg_replace('/(?smi)(<\/?sape_index>)/', '', $buffer);
            } else {
                if (isset($this->_words['__sape_new_url__']) && strlen($this->_words['__sape_new_url__'])) {
                    $buffer .= $this->_words['__sape_new_url__'];
                }
            }

            $this->_debug_action_append('No word\'s for page');

        }

        $this->_debug_action_append('STOP: replace_in_page()');
        $buffer.= $this->_debug_action_output();

        return $buffer;
    }

    function _get_db_file() {
        if ($this->_multi_site) {
            return dirname(__FILE__) . '/' . $this->_host . '.words.db';
        } else {
            return dirname(__FILE__) . '/words.db';
        }
    }

    function _get_dispenser_path() {
        return '/code_context.php?user=' . _SAPE_USER . '&host=' . $this->_host;
    }

    function set_data($data) {
        $this->_words = $data;
        if (@array_key_exists($this->_request_uri, $this->_words) && is_array($this->_words[$this->_request_uri])) {
            $this->_words_page = $this->_words[$this->_request_uri];
        }

        //Есть ли обязательный вывод
        if (isset($this->_words['__sape_page_obligatory_output__'])) {
            $this->_page_obligatory_output = $this->_words['__sape_page_obligatory_output__'];
        }
    }
}

/**
 * Класс для работы со статьями articles.sape.ru показывает анонсы и статьи
 */
class SAPE_articles extends SAPE_base {

    var $_request_mode;

    var $_server_list             = array('dispenser.articles.sape.ru');

    var $_data                    = array();

    var $_article_id;

    var $_save_file_name;

    var $_announcements_delimiter = '';

    var $_images_path;

    var $_template_error = false;

    var $_noindex_code = '<!--sape_noindex-->';

    var $_headers_enabled = false;

    var $_mask_code;

    var $_real_host;

    var $_user_agent = 'SAPE_Articles_Client PHP';

    function SAPE_articles($options = null){
        parent::SAPE_base($options);
        if (is_array($options) && isset($options['headers_enabled'])) {
            $this->_headers_enabled = $options['headers_enabled'];
        }
        // Кодировка
        if (isset($options['charset']) && strlen($options['charset'])) {
            $this->_charset = $options['charset'];
        } else {
            $this->_charset = '';
        }
        $this->_get_index();
        if (!empty($this->_data['index']['announcements_delimiter'])) {
            $this->_announcements_delimiter = $this->_data['index']['announcements_delimiter'];
        }
        if (!empty($this->_data['index']['charset'])
            and !(isset($options['charset']) && strlen($options['charset']))) {
            $this->_charset = $this->_data['index']['charset'];
        }
        if (is_array($options)) {
            if (isset($options['host'])) {
                $host = $options['host'];
            }
        } elseif (strlen($options)) {
            $host = $options;
            $options = array();
        }
        if (isset($host) && strlen($host)) {
             $this->_real_host = $host;
        } else {
             $this->_real_host = $_SERVER['HTTP_HOST'];
        }
        if (!isset($this->_data['index']['announcements'][$this->_request_uri])) {
            $this->_correct_uri();
        }
    }

    function _correct_uri() {
        if(substr($this->_request_uri, -1) == '/') {
            $new_uri = substr($this->_request_uri, 0, -1);
        } else {
            $new_uri = $this->_request_uri . '/';
        }
        if (isset($this->_data['index']['announcements'][$new_uri])) {
            $this->_request_uri = $new_uri;
        }
    }

    /**
     * Возвращает анонсы для вывода
     * @param int $n      Сколько анонсов вывести, либо не задано - вывести все
     * @param int $offset C какого анонса начинаем вывод(нумерация с 0), либо не задано - с нулевого
     * @return string
     */
    function return_announcements($n = null, $offset = 0){
        $output = '';
        if ($this->_force_show_code || $this->_is_our_bot) {
            if (isset($this->_data['index']['checkCode'])) {
                $output .= $this->_data['index']['checkCode'];
            }
        }

        if (isset($this->_data['index']['announcements'][$this->_request_uri])) {

            $total_page_links = count($this->_data['index']['announcements'][$this->_request_uri]);

            if (!is_numeric($n) || $n > $total_page_links) {
                $n = $total_page_links;
            }

            $links = array();

            for ($i = 1; $i <= $n; $i++) {
                if ($offset > 0 && $i <= $offset) {
                    array_shift($this->_data['index']['announcements'][$this->_request_uri]);
                } else {
                    $links[] = array_shift($this->_data['index']['announcements'][$this->_request_uri]);
                }
            }

            $html = join($this->_announcements_delimiter, $links);

            if ($this->_is_our_bot) {
                $html = '<sape_noindex>' . $html . '</sape_noindex>';
            }

            $output .= $html;

        }

        return $output;
    }

    function _get_index(){
        $this->_set_request_mode('index');
        $this->_save_file_name = 'articles.db';
        $this->load_data();
    }

    /**
     * Возвращает полный HTML код страницы статьи
     * @return string
     */
    function process_request(){

        if (!empty($this->_data['index']) and isset($this->_data['index']['articles'][$this->_request_uri])) {
            return $this->_return_article();
        } elseif (!empty($this->_data['index']) and isset($this->_data['index']['images'][$this->_request_uri])) {
            return $this->_return_image();
          } else {
                if ($this->_is_our_bot) {
                    return $this->_return_html($this->_data['index']['checkCode'] . $this->_noindex_code);
                } else {
                    return $this->_return_not_found();
                }
          }
    }

    function _return_article(){
        $this->_set_request_mode('article');
        //Загружаем статью
        $article_meta = $this->_data['index']['articles'][$this->_request_uri];
        $this->_save_file_name = $article_meta['id'] . '.article.db';
        $this->_article_id = $article_meta['id'];
        $this->load_data();

        //Обновим если устарела
        if (!isset($this->_data['article']['date_updated']) OR $this->_data['article']['date_updated']  < $article_meta['date_updated']) {
            unlink($this->_get_db_file());
            $this->load_data();
        }

        //Получим шаблон
        $template = $this->_get_template($this->_data['index']['templates'][$article_meta['template_id']]['url'], $article_meta['template_id']);

        //Выведем статью
        $article_html = $this->_fetch_article($template);

        if ($this->_is_our_bot) {
            $article_html .= $this->_noindex_code;
        }

        return $this->_return_html($article_html);

    }

    function _prepare_path_to_images(){
        $this->_images_path = dirname(__FILE__) . '/images/';
        if (!is_dir($this->_images_path)) {
            // Пытаемся создать папку.
            if (@mkdir($this->_images_path)) {
                @chmod($this->_images_path, 0777);    // Права доступа
            } else {
                return $this->raise_error('Нет папки ' . $this->_images_path . '. Создать не удалось. Выставите права 777 на папку.');
              }
        }
        if ($this->_multi_site) {
            $this->_images_path .= $this->_host. '.';
        }

        return true;
    }

    function _return_image(){
        $this->_set_request_mode('image');
        $this->_prepare_path_to_images();

        //Проверим загружена ли картинка
        $image_meta = $this->_data['index']['images'][$this->_request_uri];
        $image_path = $this->_images_path . $image_meta['id']. '.' . $image_meta['ext'];

        if (!is_file($image_path) or filemtime($image_path) > $image_meta['date_updated']) {
            // Чтобы не повесить площадку клиента и чтобы не было одновременных запросов
            @touch($image_path, $image_meta['date_updated']);

            $path = $image_meta['dispenser_path'];

            foreach ($this->_server_list as $server){
                if ($data = $this->fetch_remote_file($server, $path)) {
                    if (substr($data, 0, 12) == 'FATAL ERROR:') {
                        $this->raise_error($data);
                    } else {
                        // [псевдо]проверка целостности:
                        if (strlen($data) > 0) {
                            $this->_write($image_path, $data);
                            break;
                        }
                    }
                }
            }
        }

        unset($data);
        if (!is_file($image_path)) {
            return $this->_return_not_found();
        }
        $image_file_meta = @getimagesize($image_path);
        $content_type = isset($image_file_meta['mime'])?$image_file_meta['mime']:'image';
        if ($this->_headers_enabled) {
            header('Content-Type: ' . $content_type);
        }
        return $this->_read($image_path);
    }

    function _fetch_article($template){
        if (strlen($this->_charset)) {
            $template = str_replace('{meta_charset}',  $this->_charset, $template);
        }
        foreach ($this->_data['index']['template_fields'] as $field){
            if (isset($this->_data['article'][$field])) {
                $template = str_replace('{' . $field . '}',  $this->_data['article'][$field], $template);
            } else {
                $template = str_replace('{' . $field . '}',  '', $template);
            }
        }
        return ($template);
    }

    function _get_template($template_url, $templateId){
        //Загрузим индекс если есть
        $this->_save_file_name = 'tpl.articles.db';
        $index_file = $this->_get_db_file();

        if (file_exists($index_file)) {
            $this->_data['templates'] = unserialize($this->_read($index_file));
        }


        //Если шаблон не найден или устарел в индексе, обновим его
        if (!isset($this->_data['templates'][$template_url])
            or (time() - $this->_data['templates'][$template_url]['date_updated']) > $this->_data['index']['templates'][$templateId]['lifetime']) {
            $this->_refresh_template($template_url, $index_file);
        }
        //Если шаблон не обнаружен - ошибка
        if (!isset($this->_data['templates'][$template_url])) {
            if ($this->_template_error){
                return $this->raise_error($this->_template_error);
            }
            return $this->raise_error('Не найден шаблон для статьи');
        }

        return $this->_data['templates'][$template_url]['body'];
    }

    function _refresh_template($template_url, $index_file){
        $parseUrl = parse_url($template_url);

        $download_url = '';
        if ($parseUrl['path']) {
            $download_url .= $parseUrl['path'];
        }
        if (isset($parseUrl['query'])) {
            $download_url .= '?' . $parseUrl['query'];
        }

        $template_body = $this->fetch_remote_file($this->_real_host, $download_url, true);

        //проверим его на корректность
        if (!$this->_is_valid_template($template_body)){
            return false;
        }

        $template_body = $this->_cut_template_links($template_body);

        //Запишем его вместе с другими в кэш
        $this->_data['templates'][$template_url] = array( 'body' => $template_body, 'date_updated' => time());
        //И сохраним кэш
        $this->_write($index_file, serialize($this->_data['templates']));

        return true;
    }

    function _fill_mask ($data) {
        global $unnecessary;
        $len = strlen($data[0]);
        $mask = str_repeat($this->_mask_code, $len);
        $unnecessary[$this->_mask_code][] = array(
            'mask' => $mask,
            'code' => $data[0],
            'len'  => $len
        );

        return $mask;
    }

    function _cut_unnecessary(&$contents, $code, $mask) {
        global $unnecessary;
        $this->_mask_code = $code;
        $_unnecessary[$this->_mask_code] = array();
        $contents = preg_replace_callback($mask, array($this, '_fill_mask'), $contents);
    }

    function _restore_unnecessary(&$contents, $code) {
        global $unnecessary;
        $offset = 0;
        if (!empty($unnecessary[$code])) {
            foreach ($unnecessary[$code] as $meta) {
                $offset = strpos($contents, $meta['mask'], $offset);
                $contents = substr($contents, 0, $offset)
                    . $meta['code'] . substr($contents, $offset + $meta['len']);
            }
        }
    }

    function _cut_template_links($template_body) {
        if(function_exists('mb_internal_encoding') && strlen($this->_charset) > 0) {
            mb_internal_encoding($this->_charset);
        }
        $link_pattern    = '~(\<a [^\>]*?href[^\>]*?\=["\']{0,1}http[^\>]*?\>.*?\</a[^\>]*?\>|\<a [^\>]*?href[^\>]*?\=["\']{0,1}http[^\>]*?\>|\<area [^\>]*?href[^\>]*?\=["\']{0,1}http[^\>]*?\>)~si';
        $link_subpattern = '~\<a |\<area ~si';
        $rel_pattern     = '~[\s]{1}rel\=["\']{1}[^ "\'\>]*?["\']{1}| rel\=[^ "\'\>]*?[\s]{1}~si';
        $href_pattern    = '~[\s]{1}href\=["\']{0,1}(http[^ "\'\>]*)?["\']{0,1} {0,1}~si';

        $allowed_domains = $this->_data['index']['ext_links_allowed'];
        $allowed_domains[] = $this -> _host;
        $allowed_domains[] = 'www.' . $this -> _host;
        $this->_cut_unnecessary($template_body, 'C', '|<!--(.*?)-->|smi');
        $this->_cut_unnecessary($template_body, 'S', '|<script[^>]*>.*?</script>|si');
        $this->_cut_unnecessary($template_body, 'N', '|<noindex[^>]*>.*?</noindex>|si');

        $slices = preg_split($link_pattern, $template_body, -1,  PREG_SPLIT_DELIM_CAPTURE );
        //Обрамляем все видимые ссылки в noindex
        if(is_array($slices)) {
            foreach ($slices as $id => $link) {
                if ($id % 2 == 0) {
                    continue;
                }
                if (preg_match($href_pattern, $link, $urls)) {
                    $parsed_url = @parse_url($urls[1]);
                    $host = isset($parsed_url['host'])?$parsed_url['host']:false;
                    if (!in_array($host, $allowed_domains) || !$host){
                        //Обрамляем в тэги noindex
                        $slices[$id] = '<noindex>' . $slices[$id] . '</noindex>';
                    }
                }
            }
            $template_body = implode('', $slices);
        }
        //Вновь отображаем содержимое внутри noindex
        $this->_restore_unnecessary($template_body, 'N');

        //Прописываем всем ссылкам nofollow
        $slices = preg_split($link_pattern, $template_body, -1,  PREG_SPLIT_DELIM_CAPTURE );
        if(is_array($slices)) {
            foreach ($slices as $id => $link) {
                if ($id % 2 == 0) {
                    continue;
                }
                if (preg_match($href_pattern, $link, $urls)) {
                    $parsed_url = @parse_url($urls[1]);
                    $host = isset($parsed_url['host'])?$parsed_url['host']:false;
                    if (!in_array($host, $allowed_domains) || !$host) {
                        //вырезаем REL
                        $slices[$id] = preg_replace($rel_pattern, '', $link);
                        //Добавляем rel=nofollow
                        $slices[$id] = preg_replace($link_subpattern, '$0rel="nofollow" ', $slices[$id]);
                    }
                }
            }
            $template_body = implode('', $slices);
        }

        $this->_restore_unnecessary($template_body, 'S');
        $this->_restore_unnecessary($template_body, 'C');
        return $template_body;
    }

    function _is_valid_template($template_body){
        foreach ($this->_data['index']['template_required_fields'] as $field){
            if (strpos($template_body, '{' . $field . '}') === false){
                $this->_template_error = 'В шаблоне не хватает поля ' . $field . '.';
                return false;
            }
        }
        return true;
    }

    function _return_html($html){
        if ($this->_headers_enabled){
            header('HTTP/1.x 200 OK');
            if (!empty($this->_charset)){
                    header('Content-Type: text/html; charset=' . $this->_charset);
            }
        }
        return $html;
    }

    function _return_not_found(){
        header('HTTP/1.x 404 Not Found');
    }

    function _get_dispenser_path(){
        switch ($this->_request_mode){
            case 'index':
                return '/?user=' . _SAPE_USER . '&host=' .
                $this->_host . '&rtype=' . $this->_request_mode;
            break;
            case 'article':
                return '/?user=' . _SAPE_USER . '&host=' .
                $this->_host . '&rtype=' . $this->_request_mode . '&artid=' . $this->_article_id;
            break;
            case 'image':
                return $this->image_url;
            break;
        }
    }

    function _set_request_mode($mode){
        $this->_request_mode = $mode;
    }

    function _get_db_file(){
        if ($this->_multi_site){
            return dirname(__FILE__) . '/' . $this->_host . '.' . $this->_save_file_name;
        }
        else{
            return dirname(__FILE__) . '/' . $this->_save_file_name;
        }
    }

    function set_data($data){
       $this->_data[$this->_request_mode] = $data;
    }

}
