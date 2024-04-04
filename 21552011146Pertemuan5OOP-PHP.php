<?php
// Identitas proyek
// Nama: Muhammad Ikhtiar Rijalludin
// NIM: 21552011146
class Book {
    private $title;
    private $author;
    private $publicationYear;
    private $isBorrowed;

    public function __construct($title, $author, $publicationYear) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationYear = $publicationYear;
        $this->isBorrowed = false;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublicationYear() {
        return $this->publicationYear;
    }

    public function isBorrowed() {
        return $this->isBorrowed;
    }

    public function borrowBook() {
        if (!$this->isBorrowed) {
            $this->isBorrowed = true;
            return "Buku \"$this->title\" berhasil dipinjam.";
        } else {
            return "Buku \"$this->title\" sudah dipinjam.";
        }
    }

    public function returnBook() {
        if ($this->isBorrowed) {
            $this->isBorrowed = false;
            return "Buku \"$this->title\" berhasil dikembalikan.";
        } else {
            return "Buku \"$this->title\" belum dipinjam.";
        }
    }
}

class Library {
    private $books = [];

  public function addBook(Book $book) {
      $this->books[] = $book;
      return "Buku \"{$book->getTitle()}\" by {$book->getAuthor()} ({$book->getPublicationYear()}) berhasil ditambahkan ke perpustakaan.";
  }


    public function listAvailableBooks() {
        $availableBooks = [];
        foreach ($this->books as $book) {
            if (!$book->isBorrowed()) {
                $availableBooks[] = $book->getTitle() . " by " . $book->getAuthor() . " (" . $book->getPublicationYear() . ")";
            }
        }
        return $availableBooks;
    }
}

// Membuat objek perpustakaan
$library = new Library();

// Menambahkan buku ke perpustakaan
$book1 = new Book("Laskar Pelangi", "Pramoedya Ananta Toer", 1980);
echo $library->addBook($book1) . "\n";

$book2 = new Book("Bumi Manusia", "Andrea Hirata", 2005);
echo $library->addBook($book2) . "\n\n";

// Meminjam buku
echo $book1->borrowBook() . "\n";
echo $book2->borrowBook() . "\n\n";

// Mencetak daftar buku yang tersedia
echo "Buku yang tersedia:\n";
$availableBooks = $library->listAvailableBooks();
foreach ($availableBooks as $book) {
    echo "- $book\n";
}

// Mengembalikan buku
echo $book1->returnBook() . "\n\n";

// Mencetak daftar buku yang tersedia setelah pengembalian
echo "Buku yang tersedia setelah pengembalian:\n";
$availableBooks = $library->listAvailableBooks();
foreach ($availableBooks as $book) {
    echo "- $book\n";
}
?>