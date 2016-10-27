<?php 

        function converteData($data){

                $data = str_replace('/', '-', trim($data));
                $data = date('Y-m-d', strtotime($data));
                return $data;

        }

        function converteDataHora($data){

                $data = str_replace('/', '-', trim($data));
                $data = date('Y-m-d H:i:s', strtotime($data));
                return $data;

        }

        function mostrarData($data){

                $timestamp = strtotime($data); // Gera o timestamp de $data_mysql
                $data = date('d/m/Y', $timestamp);
                return $data;

        }

        function mostrarDataHora($data){

                $timestamp = strtotime($data); // Gera o timestamp de $data_mysql
                $data = date('d/m/Y H:i:s', $timestamp);
                return $data;

        }

?>