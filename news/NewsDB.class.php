<?php
require "INewsDB.class.php";
require "DataBase.php";

class NewsDB implements INewsDB
{
    private DataBase $db;

    public function __construct()
    {
        $this->db = DataBase::getInstance();
    }

    public function addNews(string $title, string $category, string $description, string $source): bool
    {
        $query = "INSERT INTO news (title, category, description, source) 
                  VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $title, $category, $description, $source);

        return $stmt->execute();
    }

    public function getNews(): array
    {
        $result = $this->db->query("SELECT * FROM news ORDER BY news.category DESC");
        $newsList = [];

        while ($row = $result->fetch_assoc())
        {
            $newsList[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'category' => $row['category'],
                'description' => $row['description'],
                'source' => $row['source']
                 ];
        }

        return $newsList;
    }

    public function deleteNews(int $id): bool
    {
        $query = "DELETE FROM news WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

}


try {
    $newsDB = new NewsDB();

    // Добавление новости
    $newsDB->addNews("Заголовок", "Категория", "Описание", "Источник");

//    // Получение всех новостей
//    $news = $newsDB->getNews();
//    print_r($news);
//
//    // Удаление новости
//    $newsDB->deleteNews(1);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}