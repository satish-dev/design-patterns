<?php
require_once 'error_reporting.php';
class Book
{
    private $author;
    private $title;
    public function __construct($title_in, $author_in)
    {
        $this->author = $author_in;
        $this->title = $title_in;
    }
    public function getAuthor()
    {
        return $this->author;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}

class BookTitleDecorator
{
    protected $book;
    protected $title;
    public function __construct(Book $book_in)
    {
        $this->book = $book_in;
        $this->resetTitle();
    }
    //doing this so original object is not altered
    public function resetTitle()
    {
        $this->title = $this->book->getTitle();
    }
    public function showTitle()
    {
        return $this->title;
    }
}

class BookTitleExclaimDecorator extends BookTitleDecorator
{
    private $btd;
    public function __construct(BookTitleDecorator $btd_in)
    {
        $this->btd = $btd_in;
    }
    public function exclaimTitle()
    {
        $this->btd->title = "!" . $this->btd->title . "!";
    }
}

class BookTitleStarDecorator extends BookTitleDecorator
{
    private $btd;
    public function __construct(BookTitleDecorator $btd_in)
    {
        $this->btd = $btd_in;
    }
    public function starTitle()
    {
        $this->btd->title = Str_replace(" ", "*", $this->btd->title);
    }
}

writeln('BEGIN TESTING DECORATOR PATTERN');
writeln('');

$patternBook = new Book('Gamma, Helm, Johnson, and Vlissides', 'Design Patterns');

$decorator = new BookTitleDecorator($patternBook);
$starDecorator = new BookTitleStarDecorator($decorator);
$exclaimDecorator = new BookTitleExclaimDecorator($decorator);

writeln('showing title : ');
writeln($decorator->showTitle());
writeln('');

writeln('showing title after two exclaims added : ');
$exclaimDecorator->exclaimTitle();
$exclaimDecorator->exclaimTitle();
writeln($decorator->showTitle());
writeln('');

writeln('showing title after star added : ');
$starDecorator->starTitle();
writeln($decorator->showTitle());
writeln('');

writeln('showing title after reset: ');
writeln($decorator->resetTitle());
writeln($decorator->showTitle());
writeln('');

writeln('END TESTING DECORATOR PATTERN');

function writeln($line_in)
{
    echo $line_in . "<br/>";
}
