<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="index.css" />
    <title>Food Purchase History</title>
  </head>
  <body>
    <div class="history-page">
      <h1 class="history-page__title">Food Purchase History</h1>
      <hr />
      <div class="search">
        <div class="search__icon-background">
          <span
            class="iconify search__icon"
            data-inline="false"
            data-icon="ant-design:search-outlined"
          ></span>
        </div>
        <input class="search__input-box" type="search" />
      </div>
      <div class="history-page__purchases"></div>
    </div>
    <script src="https://code.iconify.design/1/1.0.3/iconify.min.js"></script>
    <script src="index.js"></script>
  </body>
</html>
