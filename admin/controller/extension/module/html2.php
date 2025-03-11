<?php

class ControllerExtensionModuleHTML2 extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('extension/module/html2');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/module');
        $this->load->model('extension/module/html2');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            if(isset($this->request->post['migx'])){
                $migx = $this->request->post['migx'];
                unset($this->request->post['migx']);
            }


            if (!isset($this->request->get['module_id'])) {
                $module_id = $this->model_extension_module_html2->addModule('html2', $this->request->post);
            } else {
                $module_id = $this->request->get['module_id'];
                $this->model_extension_module_html2->editModule($this->request->get['module_id'], $this->request->post);
            }

            $this->model_extension_module_html2->clearMigx($module_id);


            if(isset($migx) && !empty($migx)){
                foreach ($migx as $name=>$group_fields){
                    foreach ($group_fields as $fields){
                        $this->model_extension_module_html2->addMigx($module_id, $name,$fields);
                    }
                }
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true));
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['name'])) {
            $data['error_name'] = $this->error['name'];
        } else {
            $data['error_name'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true)
        );

        if (!isset($this->request->get['module_id'])) {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/html2', 'user_token=' . $this->session->data['user_token'], true)
            );
        } else {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/html2', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true)
            );
        }

        if (!isset($this->request->get['module_id'])) {
            $data['action'] = $this->url->link('extension/module/html2', 'user_token=' . $this->session->data['user_token'], true);
        } else {
            $data['action'] = $this->url->link('extension/module/html2', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'], true);
        }

        $data['user_token'] = $this->session->data['user_token'];


        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=module', true);

        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $data['module_id'] = $this->request->get['module_id'];
            $module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
            if (!isset($_GET['type']) || empty($_GET['type']) || $_GET['type'] != $module_info['type']) {
                $this->response->redirect($this->url->link('extension/module/html2', 'user_token=' . $this->session->data['user_token'] . '&module_id=' . $this->request->get['module_id'] . '&type=' . $module_info['type'], true));
            }
        }else{
            $data['module_id'] = 0;
        }


        if (isset($this->request->post['name'])) {
            $data['name'] = $this->request->post['name'];
        } elseif (!empty($module_info)) {
            $data['name'] = $module_info['name'];
        } else {
            $data['name'] = '';
        }

        $this->load->model('localisation/language');

        $data['languages'] = $this->model_localisation_language->getLanguages();

        if (isset($this->request->post['status'])) {
            $data['status'] = $this->request->post['status'];
        } elseif (!empty($module_info)) {
            $data['status'] = $module_info['status'];
        } else {
            $data['status'] = '';
        }

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->load->model('tool/image');
        $thumb = $this->model_tool_image->resize('no_image.png', 100, 100);
        $data['modules'] = $this->model_extension_module_html2->html2GetModules();


        $types = ['false' => 'Обязательно измените тип!'];
        $fields = array();
        foreach ($data['modules'] as $module){
            $types[$module['name']] = $module['title'];

            $all = [];
            $lang = [];

            foreach ($module['fields'] as $key=>$field){

                $append = array(
                    'title' => $field['title'],
                    'name' => $field['name'],
                    'type' => $field['type'],
                );

                if($field['lang'] == 1){
                    $lang[] = $append;
                }else{
                    $append['value'] = '';
                    if($field['type'] == 'image'){
                        $append['thumb'] = $thumb;
                    }
                    $all[] = $append;
                }
            }

            $fields[$module['name']] = array(
                'all' => $all,
                'lang' => $lang
            );
        }
        $data['types'] = $types;




        if (isset($this->request->get['type']) && $this->request->get['type'] != false) {
            $type = trim($this->request->get['type']);
            $data['type'] = $type;
            $fields = $fields[$type];

            if ((!empty($module_info))) {
                if ($fields['all']) {
                    foreach ($fields['all'] as $key => $field) {
                        if ($fields['all'][$key]['type'] == 'image') {
                            $fields['all'][$key]['value'] = ($module_info[$field['name']]) ? $module_info[$field['name']] : '';
                            if($module_info[$field['name']]){
                                $thumb = $this->model_tool_image->resize($module_info[$field['name']], 100, 100);
                            }else{
                                $thumb = $this->model_tool_image->resize('no_image.png', 100, 100);
                            }
                            $fields['all'][$key]['thumb'] = $thumb;
                        }elseif($fields['all'][$key]['type'] != 'migx'){
                            $fields['all'][$key]['value'] = ($module_info[$field['name']]) ? $module_info[$field['name']] : '';
                        }
                    }
                }

                if (isset($fields['lang']) && $fields['lang']) {
                    foreach ($fields['lang'] as $key => $field) {
                        foreach ($data['languages'] as $language) {
                            if ($fields['lang'][$key]['type'] == 'image') {
                                $fields['lang'][$key]['value'][$language['language_id']] = ($module_info['module_description'][$language['language_id']][$field['name']]) ? $module_info['module_description'][$language['language_id']][$field['name']] : '';
                                if($module_info['module_description'][$language['language_id']][$field['name']]){
                                    $thumb = $this->model_tool_image->resize($module_info['module_description'][$language['language_id']][$field['name']], 100, 100);
                                }else{
                                    $thumb = $this->model_tool_image->resize('no_image.png', 100, 100);
                                }
                                $fields['lang'][$key]['thumb'][$language['language_id']] = $thumb;
                            } else {
                                $fields['lang'][$key]['value'][$language['language_id']] = ($module_info['module_description'][$language['language_id']][$field['name']]) ? $module_info['module_description'][$language['language_id']][$field['name']] : '';
                            }
                        }
                    }
                }

            } else {
                if (isset($fields['lang']) && $fields['lang']) {
                    foreach ($fields['lang'] as $key => $field) {
                        foreach ($data['languages'] as $language) {
                            if ($fields['lang'][$key]['type'] == 'image') {
                                $fields['lang'][$key]['value'][$language['language_id']] = '';
                                $fields['lang'][$key]['thumb'][$language['language_id']] = $thumb;
                            } else {
                                $fields['lang'][$key]['value'][$language['language_id']] = '';
                            }
                        }
                    }
                }
            }

            $data['fields'] = $fields;
        } else {
            $data['type'] = false;
        }

        $this->response->setOutput($this->load->view('extension/module/html2', $data));
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/module/html2')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 64)) {
            $this->error['name'] = $this->language->get('error_name');
        }

        return !$this->error;
    }

    public function ajax(){
        $json = array();

        $this->load->model('extension/module/html2');


        if(isset($_POST['action'])){
            $this->load->model('tool/image');
            $thumb = $this->model_tool_image->resize('no_image.png', 100, 100);
            $migx = array();

            $data['modules'] = $this->model_extension_module_html2->html2GetModules(1);
            foreach ($data['modules'] as $module){
                $all = [];
                $lang = [];

                foreach ($module['fields'] as $key=>$field){

                    $append = array(
                        'title' => $field['title'],
                        'name' => $field['name'],
                        'type' => $field['type'],
                        'head' => $field['head']
                    );
                    if($field['lang'] == 1){
                        $lang[] = $append;
                    }else{
                        $append['value'] = '';
                        if($field['type'] == 'image'){
                            $append['thumb'] = $thumb;
                        }
                        $all[] = $append;
                    }
                }

                $migx[$module['name']] = array(
                    'all' => $all,
                    'lang' => $lang
                );
            }

            $this->load->model('localisation/language');

            $default_lang_id = (int)$this->config->get('config_language_id');


            $languages = $this->model_localisation_language->getLanguages();

            switch ($_POST['action']){
                case 'load':
                    if(isset($_POST['name']) && !empty($_POST['name']) && isset($migx[$_POST['name']]) && !empty($migx[$_POST['name']])){
                        $json['html'] = '';
                        $heads = [];
                        $fields = $migx[$_POST['name']];


                        if(isset($_POST['module_id']) && $_POST['module_id'] != 0){

                            $module_infos = $this->model_extension_module_html2->getMigxInfo($_POST['module_id']);
                            foreach ($module_infos as $key => $module_info){
                                $heads = [];
                                $module_info = json_decode($module_info['setting'], true);
                                $migx_id = $key;
                                if ($fields['all']) {
                                    foreach ($fields['all'] as $key => $field) {
                                        if(isset($field['head']) && $field['head']){
                                            $heads[$field['name']] = $field['title'];
                                        }
                                        if ($fields['all'][$key]['type'] == 'image') {
                                            $fields['all'][$key]['value'] = (isset($module_info[$field['name']])) ? $module_info[$field['name']] : '';
                                            if(isset($module_info[$field['name']])){
                                                $thumb = $this->model_tool_image->resize($module_info[$field['name']], 100, 100);
                                            }else{
                                                $thumb = $this->model_tool_image->resize('no_image.png', 100, 100);
                                            }
                                            $fields['all'][$key]['thumb'] = $thumb;
                                        }elseif($fields['all'][$key]['type'] != 'migx'){
                                            $fields['all'][$key]['value'] = ($module_info[$field['name']]) ? $module_info[$field['name']] : '';
                                        }
                                    }
                                }

                                if ($fields['lang']) {
                                    foreach ($fields['lang'] as $key => $field) {
                                        foreach ($languages as $language) {
                                            if(isset($field['head']) && $field['head']){
                                                $heads[$field['name']] = $field['title'];
                                            }
                                            if ($fields['lang'][$key]['type'] == 'image') {
                                                $fields['lang'][$key]['value'][$language['language_id']] = (isset($module_info['module_description'][$language['language_id']][$field['name']])) ? $module_info['module_description'][$language['language_id']][$field['name']] : '';
                                                if(isset($module_info['module_description'][$language['language_id']][$field['name']])){
                                                    $thumb = $this->model_tool_image->resize($module_info['module_description'][$language['language_id']][$field['name']], 100, 100);
                                                }else{
                                                    $thumb = $this->model_tool_image->resize('no_image.png', 100, 100);
                                                }
                                                $fields['lang'][$key]['thumb'][$language['language_id']] = $thumb;
                                            } else {
                                                $fields['lang'][$key]['value'][$language['language_id']] = (isset($module_info['module_description'][$language['language_id']][$field['name']])) ? $module_info['module_description'][$language['language_id']][$field['name']] : '';
                                            }
                                        }
                                    }
                                }

                                $json['html'] .= $this->load->view('extension/module/html2_load', ['migx_name' => $_POST['name'],'migx_id'=> $migx_id,'fields' => $fields,'languages'=>$languages,'default_lang_id'=>$default_lang_id]);
                            }

                            $json['start_html'] = '<table class="table table-striped">';
                            $json['start_html'].= '<thead>';
                            $json['start_html'].= '<tr>';
                            $json['start_html'].= '<td>#</td>';
                            foreach ($heads as $head){
                                $json['start_html'].= '<td>';
                                $json['start_html'].= $head;
                                $json['start_html'].= '</td>';
                            }
                            $json['start_html'].= '<td>Действие</td>';
                            $json['start_html'].= '</tr>';
                            $json['start_html'].= '</thead>';
                            $json['start_html'].= '<tbody>';

                            $json['end_html'] = '</tbody>';
                            $json['end_html'].= '<tfoot>';
                            $json['end_html'].= '<tr>';
                            $json['end_html'].= '<td></td>';
                            foreach ($heads as $head) {
                                $json['end_html'].= '<td></td>';
                            }

                            $json['end_html'].= '<td>';
                            $json['end_html'].= '<button type="button" class="btn btn-info btn-lg addNewMigxRow"  data-migx-name="'.$_POST['name'].'">';
                            $json['end_html'].= '<i class="fa fa-plus"></i>';
                            $json['end_html'].= '</button>';
                            $json['end_html'].= '</td>';
                            $json['end_html'].= '</tr>';
                            $json['end_html'].= '</tfoot>';
                            $json['end_html'].= '</table>';
                            $json['html'] = $json['start_html'].$json['html'].$json['end_html'];

                        }else{
                            $migx_id = 0;
                            //собирем шапку таблицы
                            //+ подставка дефолт значений
                            if ($fields['lang']) {
                                foreach ($fields['lang'] as $key => $field) {
                                    if(isset($field['head']) && $field['head']){
                                        $heads[$field['name']] = $field['title'];
                                    }
                                    foreach ($languages as $language) {
                                        if ($fields['lang'][$key]['type'] == 'image') {
                                            $fields['lang'][$key]['value'][$language['language_id']] = '';
                                            $fields['lang'][$key]['thumb'][$language['language_id']] = $thumb;
                                        } else {
                                            $fields['lang'][$key]['value'][$language['language_id']] = '';
                                        }
                                    }
                                }
                            }
                            if ($fields['all']) {
                                foreach ($fields['all'] as $key => $field) {
                                    if(isset($field['head']) && $field['head']){
                                        $heads[$field['name']] = $field['title'];
                                    }
                                }
                            }

                            $json['html'] .= $this->load->view('extension/module/html2_load', ['migx_name' => $_POST['name'],'migx_id'=> $migx_id,'fields' => $fields,'languages'=>$languages,'default_lang_id'=>$default_lang_id]);

                            $json['start_html'] = '<table class="table table-striped">';
                            $json['start_html'].= '<thead>';
                            $json['start_html'].= '<tr>';
                            $json['start_html'].= '<td>#</td>';
                            foreach ($heads as $head){
                                $json['start_html'].= '<td>';
                                $json['start_html'].= $head;
                                $json['start_html'].= '</td>';
                            }
                            $json['start_html'].= '<td>Действие</td>';
                            $json['start_html'].= '</tr>';
                            $json['start_html'].= '</thead>';
                            $json['start_html'].= '<tbody>';

                            $json['end_html'] = '</tbody>';
                            $json['end_html'].= '<tfoot>';
                            $json['end_html'].= '<tr>';
                            $json['end_html'].= '<td></td>';
                            foreach ($heads as $head) {
                                $json['end_html'].= '<td></td>';
                            }

                            $json['end_html'].= '<td>';
                            $json['end_html'].= '<button type="button" class="btn btn-info btn-lg addNewMigxRow"  data-migx-name="'.$_POST['name'].'">';
                            $json['end_html'].= '<i class="fa fa-plus"></i>';
                            $json['end_html'].= '</button>';
                            $json['end_html'].= '</td>';
                            $json['end_html'].= '</tr>';
                            $json['end_html'].= '</tfoot>';
                            $json['end_html'].= '</table>';
                            $json['html'] = $json['start_html'].$json['html'].$json['end_html'];

                        }
                    }else{
                        $json['error'] = 'Error load name';
                    }
                    break;
                case 'add':
                    if(isset($_POST['name']) && !empty($_POST['name']) && isset($migx[$_POST['name']]) && !empty($migx[$_POST['name']]) && isset($_POST['migx_id'])) {
                        $migx_id = $_POST['migx_id']+1;
                        $migx_name = $_POST['name'];
                        $json['html'] = '';
                        $heads = [];
                        $fields = $migx[$_POST['name']];
                        if ($fields['lang']) {
                            foreach ($fields['lang'] as $key => $field) {
                                if(isset($field['head']) && $field['head']){
                                    $heads[$field['name']] = $field['title'];
                                }
                                foreach ($languages as $language) {
                                    if ($fields['lang'][$key]['type'] == 'image') {
                                        $fields['lang'][$key]['value'][$language['language_id']] = '';
                                        $fields['lang'][$key]['thumb'][$language['language_id']] = $thumb;
                                    } else {
                                        $fields['lang'][$key]['value'][$language['language_id']] = '';
                                    }
                                }
                            }
                        }
                        if ($fields['all']) {
                            foreach ($fields['all'] as $key => $field) {
                                if(isset($field['head']) && $field['head']){
                                    $heads[$field['name']] = $field['title'];
                                }
                            }
                        }

                        $json['html'] .= $this->load->view('extension/module/html2_load', ['disable_tr' => true,'migx_name' => $_POST['name'],'migx_id'=> $migx_id,'fields' => $fields,'languages'=>$languages,'default_lang_id'=>$default_lang_id]);

                        $json['tr'] ='<tr data-migx-name="'.$migx_name.'" data-migx-id="'.$migx_id.'">';
                        $json['tr'].= '<td>'.($migx_id+1).'</td>';
                        foreach ($heads as $key=>$head){
                            $json['tr'].= '<td data-title="'.$key.'">';
                            $json['tr'].= '</td>';
                        }
                        $json['tr'].= '<td>';
                        $json['tr'].= '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#migx-'.$migx_name.'-'.$migx_id.'">';
                        $json['tr'].= '<i class="fa fa-pencil"></i>';
                        $json['tr'].= '</button>';

                        $json['tr'].= '<button type="button" class="btn btn-danger btn-lg removeThisMigx" data-target="#migx-'.$migx_name.'-'.$migx_id.'">';
                        $json['tr'].= '<i class="fa fa-trash-o"></i>';
                        $json['tr'].= '</button>';

                        $json['tr'].= '</td>';
                        $json['tr'].= '</tr>';
                        $json['tr'].= '</thead>';

                    }else{
                        $json['error'] = 'Error load name';
                    }
                    break;
                default:
                    break;
            }
        }else{
            $json['error']  = "Error Action";
        }
        echo json_encode($json);
    }

    public function install()
    {
        $this->load->model('extension/module/html2');
        $this->model_extension_module_html2->install();
    }
}