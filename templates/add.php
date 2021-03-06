<main>
    <nav class="nav">
      <ul class="nav__list container">
        <?php foreach ($categories as $category): ?>
          <li class="nav__item">
            <a href="all-lots.html"><?=$category['name'];?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <form class="form form--add-lot container <?php if(count($errors) > 0) { echo 'form--invalid';}; ?>" action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
      <h2>Добавление лота</h2>
      <div class="form__container-two">
        <div class="form__item <?php if(isset($errors['title'])) { echo 'form__item--invalid';}; ?>"> <!-- form__item--invalid -->
          <label for="lot-name">Наименование</label>
          <input id="lot-name" type="text" name="title" placeholder="Введите наименование лота" value="<?= isset($values['title']) ? $values['title'] : '' ?>">
          <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item <?php if(isset($errors['category'])) { echo 'form__item--invalid';}; ?>">
          <label for="category">Категория</label>
          <select id="category" name="category">
            <option>Выберите категорию</option>
            <?php foreach ($categories as $category): ?>
                <?php $selected = $category['id'] === $category_id ? 'selected' : ""; ?>
                <option value="<?= $category['id']; ?>" <?= $selected; ?>><?= $category['name']; ?></option>
            <?php endforeach; ?>
          </select>
          <span class="form__error">Выберите категорию</span>
        </div>
      </div>
      <div class="form__item form__item--wide <?php if(isset($errors['description'])) { echo 'form__item--invalid';}; ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="description" placeholder="Напишите описание лота"><?= isset($values['description']) ? $values['description'] : '' ?></textarea>
        <span class="form__error">Напишите описание лота</span>
      </div>
      <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
          <button class="preview__remove" type="button">x</button>
          <div class="preview__img">
            <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
          </div>
        </div>
        <div class="form__input-file">
          <input class="visually-hidden" type="file" id="photo2" name="image" value="">
          <label for="photo2">
            <span>+ Добавить</span>
          </label>
        </div>
      </div>
      <div class="form__container-three">
        <div class="form__item form__item--small">
          <label for="lot-rate">Начальная цена</label>
          <input id="lot-rate" type="number" name="start_price" placeholder="0" value="<?= isset($values['start_price']) ? $values['start_price'] : '' ?>">
          <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small">
          <label for="lotstep">Шаг ставки</label>
          <input id="lot-step" type="number" name="lot_step" placeholder="0" value="<?= isset($values['lot_step']) ? $values['lot_step'] : '' ?>">
          <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item">
          <label for="lot-date">Дата окончания торгов</label>
          <input class="form__input-date" id="lot-date" type="date" name="end_date">
          <span class="form__error">Введите дату завершения торгов</span>
        </div>
      </div>
      <?php if (count($errors) > 0): ?>
          <span class="form__error form__error--bottom">Пожалуйста, исправьте следующие ошибки в форме:</span>
          <ul>
              <?php foreach ($errors as $err => $val): ?>
                  <li><strong><?= $err; ?></strong> <?= $val; ?></li>
              <?php endforeach; ?>
          </ul>
      <?php endif; ?>
      <button type="submit" class="button">Добавить лот</button>
    </form>
  </main>