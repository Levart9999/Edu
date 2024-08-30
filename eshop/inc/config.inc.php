<?php
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASSWORD = "ion11";
const DB_NAME = "eshop";

const ORDERS_LOG = "orders.log";

$basket = [];
$count = 0;

$link = mysqli_connect(DB_HOST, DB_USER,
    DB_PASSWORD, DB_NAME)
or die(mysqli_connect_error());

basketInit();
