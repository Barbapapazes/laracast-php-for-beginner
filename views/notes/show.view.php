<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>


<main>
  <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p>
      <a href="/notes">Back to notes</a>
    </p>

    <p>
      <?= htmlspecialchars($note['body']) ?>
    </p>

    <footer class="mt-4">

      <a href="/note/edit?id=<?= $note['id'] ?>" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Edit</a>

  </footer>

    <!-- <form class="mt-4" method="POST">
      <input hidden name="_method" value="DELETE">
      <input type="text" value="<?= $note['id'] ?>" name="id" hidden>
      <button type="submit" class="text-red-500">
        Delete
      </button>
    </form> -->
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
