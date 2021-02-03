<?php


use App\Database;
use PHPUnit\Framework\TestCase;

final class DatabaseTest extends TestCase
{
    public function testCanConnectToDatabase(): void
    {
        $this->assertInstanceOf(PDO::class, Database::getInstance());
    }

    public function testCanFetchUsers(): void
    {
        $query = Database::prepare("SELECT * FROM users");
        $query->execute();

        $this->assertEquals(4, $query->rowCount());
    }
}
