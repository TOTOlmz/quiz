<?php
/* |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
    Classe gérant les signalements
||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| */
namespace App\Models;

use App\Models\BaseModel;

class ReportModel extends BaseModel {

    public static function createReport(array $params): ?int {
        $sql = "INSERT INTO reports (quiz_id, creator_id, reporter_id, title, comment, created_at) 
                VALUES (:quiz_id, :creator_id, :reporter_id, :title, :comment, :created_at)";
        $stmt = self::lastInsert($sql, $params);
        return $stmt ?: null;
    }

    public static function getReports(): array {
        $sql = "SELECT * FROM reports";;
        $stmt = self::fetchAll($sql);
        return $stmt ?: [];
    }

}