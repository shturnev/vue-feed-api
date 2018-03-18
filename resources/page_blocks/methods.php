<div style="margin-top: 35px;">
  <h4>Methods</h4>
  <ul class="accordion"
      data-accordion
      data-multi-expand="true"
      data-allow-all-closed="true"
  >

    <!-- Client. Получить инфо о клиенте(ах) -->
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">
        Client. Получить инфо о клиенте(ах)
      </a>

      <div class="accordion-content" data-tab-content>
        <div class="grid-x grid-padding-x">
          <div class="cell medium-6 small-12">
            <h5>Request params: </h5>
            <ul class="no-bullet" style="font-size: 13px; padding-left: 20px; margin-top: 0;">
              <li><b>method_name</b>: 'client_get'</li>
              <li><b>m</b>: 1</li>
              <li><b>email</b>: (string)</li>
              <li><b>pass</b>: (string)</li>
              <li><b><abbr title="указать если нужен конкретный клиент"> public_key</abbr></b>: (string)</li>
            </ul>
          </div>
          <div class="cell medium-6 small-12">
            <h5>Response: </h5>

            <pre><code>
{
  "response": [
    {
      "id": 6,
      "user_id": 7,
      "date": 1521197697,
      "public_key": "bfdfd2f24526f3dbd7a6339297a640a54d00a2206ba26d818c9acce235280bd9",
      "title": "Project name (client 1)",
      "private_key": "c1d0920dc08e442e9fa8f8d4403bb917697f1b04597cee788c08fbe534bbac95"
    },
    {
      "id": 5,
      "user_id": 7,
      "date": 1521196857,
      "public_key": "ab2a043da4648ac12dbec029f9729b16a9f3c4ee3c4ee119dad3e4316d0d40fb",
      "title": "Project name (client 2)",
      "private_key": "fb5c4719663f26bd3cc104be5623fc0ffe1eefcc59f8d47237b428872bf0e464"
    }
  ]
}

              </code>
          </div>

        </div>
    </li>

    <!-- Feed. add -->
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">
        Feed. Добавить запись
      </a>

      <div class="accordion-content" data-tab-content>
        <div class="grid-x grid-padding-x">
          <div class="cell medium-6 small-12">
            <h5>Request params: </h5>
            <ul class="no-bullet" style="font-size: 13px; padding-left: 20px; margin-top: 0;">
              <li><b>method_name</b>: 'feed_add'</li>
              <li><b>private_key</b>: (string)</li>
              <li><b>protected</b>: (int) 0 / 1</li>
              <li><b>title</b>: (string)</li>
              <li><b>text</b>: (string)</li>
            </ul>
          </div>
          <div class="cell medium-6 small-12">
            <h5>Response: </h5>

            <pre><code>
{
  "response": {
    "client_id": 6,
    "user_id": 7,
    "protected": 0,
    "date": 1521285397,
    "title": "test title",
    "text": "long text text",
    "id": 3
  }
}
              </code></pre>
          </div>


        </div>
    </li>

    <!-- Feed. edit -->
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">
        Feed. Редактировать запись
      </a>

      <div class="accordion-content" data-tab-content>
        <div class="grid-x grid-padding-x">
          <div class="cell medium-6 small-12">
            <h5>Request params: </h5>
            <ul class="no-bullet" style="font-size: 13px; padding-left: 20px; margin-top: 0;">
              <li><b>method_name</b>: 'feed_edit'</li>
              <li><b>private_key</b>: (string)</li>
              <li><b>id</b>: (int)</li>
              <li><b>protected</b>: (int) 0 / 1</li>
              <li><b>title</b>: (string)</li>
              <li><b>text</b>: (string)</li>
            </ul>
          </div>
          <div class="cell medium-6 small-12">
            <h5>Response: </h5>

            <pre><code>{"response":true}</code></pre>
          </div>


        </div>
    </li>

    <!-- Feed. delete -->
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">
        Feed. Удалить запись
      </a>

      <div class="accordion-content" data-tab-content>
        <div class="grid-x grid-padding-x">
          <div class="cell medium-6 small-12">
            <h5>Request params: </h5>
            <ul class="no-bullet" style="font-size: 13px; padding-left: 20px; margin-top: 0;">
              <li><b>method_name</b>: 'feed_delete'</li>
              <li><b>private_key</b>: (string)</li>
              <li><b>id</b>: (int)</li>
            </ul>
          </div>
          <div class="cell medium-6 small-12">
            <h5>Response: </h5>

            <pre><code>{"response":true}</code></pre>
          </div>


        </div>
    </li>
    
    
    <!-- Feed GET. m1 by id -->
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">
        Feed GET. m1 вывод записи по id
      </a>

      <div class="accordion-content" data-tab-content>
        <div class="grid-x grid-padding-x">
          <div class="cell medium-6 small-12">
            <h5>Request params: </h5>
            <ul class="no-bullet" style="font-size: 13px; padding-left: 20px; margin-top: 0;">
              <li><b>method_name</b>: 'feed_get'</li>
              <li><b>m</b>: 1</li>
              <li><b>public_key</b>: (string)</li>
              <li><b><abbr title="Передавать в случае если запись protected">private_key</abbr></b>: (string)</li>
              <li><b>id</b>: (int)</li>
            </ul>
          </div>
          <div class="cell medium-6 small-12">
            <h5>Response: </h5>

            <pre><code>
{
  "response": {
    "id": 1,
    "client_id": 6,
    "user_id": 7,
    "protected": 0,
    "date": 1521285309,
    "title": "xxxx",
    "text": "xxxx"
  }
}
              </code></pre>
          </div>


        </div>
    </li>

    <!-- Feed GET. m2 few items -->
    <li class="accordion-item" data-accordion-item>
      <a href="#" class="accordion-title">
        Feed GET. m2 вывод списка записей
      </a>

      <div class="accordion-content" data-tab-content>
        <div class="grid-x grid-padding-x">
          <div class="cell medium-6 small-12">
            <h5>Request params: </h5>
            <ul class="no-bullet" style="font-size: 13px; padding-left: 20px; margin-top: 0;">
              <li><b>method_name</b>: 'feed_get'</li>
              <li><b>m</b>: 2</li>
              <li><b>public_key</b>: (string)</li>
              <li><b><abbr title="Передавать в случае если нужно получить доступ к potected записям">private_key</abbr></b>: (string)</li>
              <li><b><abbr title="В случае если нужен вывод только по поисковому запросу">search</abbr></b>: (string)</li>
              <li><b><abbr title="кол-во штук">limit</abbr></b>: (int)</li>
              <li><b><abbr title="страница">page</abbr></b>: (int)</li>
            </ul>
          </div>
          <div class="cell medium-6 small-12">
            <h5>Response: </h5>

            <pre><code>
{
  "response": {
    "count_items": 13,
    "search": false,
    "items": [
      {
        "id": 15,
        "client_id": 6,
        "user_id": 7,
        "protected": 1,
        "date": 1521383583,
        "title": "et id qui inventore dolorem dignissimos sed",
        "text": "It was opened by another footman in livery, with a trumpet in one hand and a large dish of tarts upon it: they looked so good, that it led into the open air. 'IF I don't want YOU with us!\"' 'They."
      },
      {
        "id": 14,
        "client_id": 6,
        "user_id": 7,
        "protected": 1,
        "date": 1521383581,
        "title": "blanditiis voluptatum aliquam illo occaecati ut at",
        "text": "Hatter: 'but you could draw treacle out of sight before the end of the baby, it was getting so used to it in a hoarse, feeble voice: 'I heard every word you fellows were saying.' 'Tell us a story.'."
      },
      {
        "id": 13,
        "client_id": 6,
        "user_id": 7,
        "protected": 0,
        "date": 1521383577,
        "title": "voluptates eos provident sint delectus est sequi",
        "text": "Alice. 'I don't think it's at all comfortable, and it put the hookah out of the way--' 'THAT generally takes some time,' interrupted the Gryphon. 'Well, I shan't go, at any rate, the Dormouse denied."
      }
    ],
    "pages": {
      "first": null,
      "last": 5,
      "center": 1,
      "prev": null,
      "next": 2,
      "left": [],
      "right": [
        2,
        3,
        4
      ]
    }
  }
}
              </code></pre>
          </div>


        </div>
    </li>


  </ul>
</div>