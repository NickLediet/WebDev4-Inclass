<?php
  $filter;
  if(isset($_GET["filter"])) {
    $filter = $_GET["filter"];
  }

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="index.php">Movie Site!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item <?= $filter === "action" ? "active" : "" ?>">
        <a class="nav-link " href="<?= $_SERVER["DOCUMENT_ROOT"]."\index.php?filter=action"?>">Action</a>
      </li>
      <li class="nav-item <?= $filter === "comedy" ? "active" : "" ?>">
        <a class="nav-link" href="<?= $_SERVER["DOCUMENT_ROOT"]?>/index.php?filter=comedy">Comedy</a>
      </li>
      <li class="nav-item <?= $filter === "family" ? "active" : "" ?>">
        <a class="nav-link" href="<?= $_SERVER["DOCUMENT_ROOT"]?>/index.php?filter=family">Family</a>
      </li>
      <li class="nav-item <?= !$filter ? "active": "" ?>">
        <a class="nav-link" href="<?= $_SERVER["DOCUMENT_ROOT"]?>/index.php">All <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>