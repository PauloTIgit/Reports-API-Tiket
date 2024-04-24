<?php
session_start();
require 'autoloadClass.php';
$ControllerViewer = new Viewer();
$ControllerViewer->RotaViewer();