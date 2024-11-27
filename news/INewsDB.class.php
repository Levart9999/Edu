<?php

interface INewsDB
{

 public function addNews(string $title, string $category, string $description,
                         string $source): bool;
 public function getNews(): array;

 public function deleteNews(int $id):bool;

}
