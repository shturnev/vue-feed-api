<div style="margin-top: 35px;">
    <h4>Your clients</h4>
    <ul class="accordion"
        data-accordion
        data-multi-expand="true"
        data-allow-all-closed="true"
    >
        <? foreach ($clients as $client) { ?>
            <li class="accordion-item" data-accordion-item>
                <div class="accordion-menu"></div>
                <a href="#" class="accordion-title"><? echo $client['title'] ?></a>


                <div class="accordion-content" data-tab-content>
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-5 small-12">
                            <div class="input-group">
                                <label class="input-group-label">public key</label>
                                <input class="input-group-field" value="<? echo $client['public_key'] ?>" type="text">
                            </div>
                        </div>
                        <div class="cell medium-5 small-12">
                            <div class="input-group">
                                <label class="input-group-label">secret key</label>
                                <input class="input-group-field" value="<? echo $client['private_key'] ?>" type="text">
                            </div>
                        </div>
                        <div class="cell  medium-2 small-12">
                            <a href="/api.php?method_name=client_delete&id=<? echo $client['id'] ?>" data-js="delete-item" class="button tiny expanded secondary hollow">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </div>

                </div>
            </li>
        <? } ?>
    </ul>
</div>