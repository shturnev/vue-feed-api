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

  </ul>
</div>