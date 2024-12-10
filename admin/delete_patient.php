<?php
  require_once 'logincheck.php';

  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "hcpms");

    if($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Start a transaction
    $conn->begin_transaction();

    try {
      // Delete complaints related to the patient
      $complaintQuery = $conn->query("DELETE FROM `complaints` WHERE `itr_no` = '$id'");

      if (!$complaintQuery) {
        throw new Exception("Error deleting complaints: " . $conn->error);
      }

      // Delete patient record
      $patientQuery = $conn->query("DELETE FROM `itr` WHERE `itr_no` = '$id'");

      if (!$patientQuery) {
        throw new Exception("Error deleting patient record: " . $conn->error);
      }

      // Commit transaction
      $conn->commit();

      echo "<script>alert('Patient record and complaints deleted successfully.'); window.location='home.php';</script>";
    } catch (Exception $e) {
      // Rollback transaction in case of error
      $conn->rollback();
      echo "<script>alert('Error deleting record: " . $e->getMessage() . "'); window.location='patient.php';</script>";
    }

    $conn->close();
  } else {
    echo "<script>alert('Invalid request.'); window.location='patient.php';</script>";
  }
?>
