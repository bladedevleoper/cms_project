<?php

interface ArticleInterface
{
    public function displayArticles();
    public function articleComment($username, $comment, $article_id);
    public function displayArticlePosts($id);
}