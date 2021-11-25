# blog

## UseCaseとは？
- 簡単に言うとシステムでできることを指す　ex)ユーザー登録する、Blogを新規作成する
- Domainを使った操作がUseCaseであるとも言える
- 設計構造としてはUsecaseInput, UsecaseInteractor, UsecaseOutputの3つを作る！
- UsecaseInput:「UsecaseInteractor」で使う値をまとめた箱的な感じ! この箱があることで、「UsecaseInteractor」で使う値が増えたとしても「UsecaseInput」のプロパティを増やせば良いだけにできる！
- UsecaseInteractor: 「UsecaseInput」を受け取り、「UsecaseOutput」を返す！ 「interface」を作るとなお良い！InputとOutputを型にすることで堅牢なシステム設計となる
ex)UsecaseInput型を受け取り、UsecaseOutput型を返す型でないとエラーにする
- UsecaseOutput: 「UsecaseInteractor」で返す値をまとめた箱的な感じ! この箱があることで、「UsecaseInteractor」で返す値が増えたとしても「UsecaseOutput」で返す値を増やせばよいだけにできる！
## SQL文

CREATE DATABASE blog;

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); 

CREATE TABLE `comments` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `commenter_name` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
); 