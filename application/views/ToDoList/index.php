<main>
    <div>
        <div class="bg-primary">
            <h1 class="m-0 pl-4 d-inline">ToDo</h1>
        </div>
        <div class="nav-bar bg-secondary">
            <p class="m-0 pl-4">Welcome back!</p>
        </div>
    </div>

    <div class="d-flex p-5">
        <?php foreach ($listData as $list): ?>

            <div style="width:280px;" class="mx-2">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-primary"><?php echo $list['list_name']?>
                        <div class="d-inline float-right">
                            <div class="list-group-item p-0">
                                <div style="width:10px;" class="container">
                                    <div class="row">
                                        <a class="col p-0 pl-2" style="font-size:10px;" onclick="setupListUpdate">✎</a>
                                        <a class="col p-0 pl-2" style="font-size:10px;" href="<?php echo base_url("Main/deleteList/"). $list['list_id']?>">❌</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
                <ul class="list-unstyled overflow-auto mh-80">
                    <?php foreach ($itemData as $item): ?>
                        <?php if ($item["list_id"] === $list["list_id"]) { ?>
                            <li class="list-group-item pb-3"><p class="d-inline"><?php echo $item["item_name"] ?></p>
                                <div class="d-inline float-right">
                                    <div class="list-group-item p-0">
                                        <div style="width:10px;" class="container">
                                            <div class="row">
                                                <a class="col p-0 pl-2" style="font-size:10px;" onclick="setUpItemUpdate(<?php $item ?>)" data-toggle="modal">✎</a>
                                                <a class="col p-0 pl-2" style="font-size:10px;" href="<?php echo base_url("Main/deleteItem/"). $item['item_id']?>">❌</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php endforeach; ?>
                    <li class="list-group-item pb-2"><a onclick="setUpItemCreate(<?php echo $list["list_id"]?>, '<?php echo $list["list_name"] ?>')"
                                                        href="#" data-toggle="modal" data-target="#newItem"><i class="fas fa-plus"> New Item</i></a></li>
                </ul>
            </div>
        <?php endforeach; ?>

        <div class="mx-2">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-primary"><a href="#" data-toggle="modal" data-target="#newList">
                        <i class="fas fa-plus"> New List</i></a></li>
            </ul>
        </div>
    </div>


    <!------------List create------------>
    <div class="modal fade" id="newList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newListTitle">New List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Main/createList/') ?>" method="post">
                    <div class="modal-body">
                        <p class="mb-0 mt-2">Title</p><input name="createListName" type="text" class="form-control" placeholder="Title">
                        <p class="mb-0 mt-2">Details</p><input name="createListDetails" type="text" class="form-control" placeholder="Details">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save List</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------List update------------>
<!--    <div class="modal fade" id="UpdateList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="newListTitle">New List</h5>-->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <form action="--><?php //echo base_url('Main/updateList/') ?><!--" method="post">-->
<!--                    <div class="modal-body">-->
<!--                        <input name="updateListId" type="number" placeholder="" required hidden>-->
<!--                        <p class="mb-0 mt-2">Title</p><input name="updateListName" type="text" class="form-control" placeholder="Title" required>-->
<!--                        <p class="mb-0 mt-2">Details</p><input name="updateListDetails" type="text" class="form-control" placeholder="Details">-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                        <button type="submit" class="btn btn-primary">Save List</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->


    <!------------Item create------------>
    <div class="modal fade" id="newItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newItemTitle">New Item</h5>
                    <p class="mb-0 mt-4">Add to list:&nbsp;</p><p class="mb-0 mt-4" id="createItemName"></p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('/Main/createItem/') ?>" method="post">
                    <div class="modal-body">
                        <input id="createItemListId" name="createItemListId" type="number" placeholder="ID" required hidden>
                        <p class="mb-0 mt-2">Title</p><input name="createItemName" type="text" class="form-control" placeholder="Title" required>
                        <p class="mb-0 mt-2">Details</p><input name="createItemDetails" type="text" class="form-control h-20" placeholder="Details">
                        <input value="0" name="createItemStatus" type="number" placeholder="" required hidden>
                        <p class="mb-0 mt-2">Estimated time</p><input name="createItemTime" type="number" min="0" class="form-control" placeholder="Minutes">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------Item update------------>
<!--    <div class="modal fade" id="updateItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">-->
<!--        <div class="modal-dialog" role="document">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="newItemTitle">New Item</h5>-->
<!--                    <p class="mb-0 mt-4">Add to list:&nbsp;</p><p class="mb-0 mt-4" id="currentItemName"></p>-->
<!---->
<!--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                        <span aria-hidden="true">&times;</span>-->
<!--                    </button>-->
<!--                </div>-->
<!--                <form action="--><?php //echo base_url('Main/UpdateItem/') ?><!--" method="post">-->
<!--                    <div class="modal-body">-->
<!--                        <input id="updateItemId" name="updateItemId" type="number" placeholder="ID" required hidden>-->
<!--                        <input id="updateItemListId" name="updateItemListId" type="number" placeholder="ID" required hidden>-->
<!--                        <p class="mb-0 mt-2">Title</p><input id="updateItemName" name="updateItemName" type="text" class="form-control" placeholder="Title" required>-->
<!--                        <p class="mb-0 mt-2">Details</p><input id="updateItemDetails" name="updateItemDetails" type="text" class="form-control h-20" placeholder="Details">-->
<!--                        <p class="mb-0 mt-2">Status</p><input id="updateItemStatus" value="0" name="updateItemStatus"  type="number" min="0" max="1" class="form-control h-20" placeholder="Details" required hidden>-->
<!--                        <p class="mb-0 mt-2">Estimated time</p><input id="updateItemTime" name="updateItemTime" type="number" min="0" class="form-control" placeholder="Minutes">-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                        <button type="submit" class="btn btn-primary">Save Item</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

</main>

<script>
    // gives the list_id to the item add form
    function setUpItemCreate(createItemListId, createItemName)
    {
        document.getElementById("createItemListId").value = createItemListId;
        document.getElementById("createItemName").innerText = createItemName;
    }
    // function setUpItemUpdate(updateItemData)
    // {
    //     document.getElementById("updateItemId").value = updateItemData[0];
    //     document.getElementById("updateItemListId").value = updateItemData[1];
    //     document.getElementById("updateItemName").value = updateItemData[2];
    //     document.getElementById("updateItemName").placeholder = updateItemData[2];
    //     document.getElementById("updateItemDetails").value = updateItemData[3];
    //     document.getElementById("updateItemDetails").placeholder = updateItemData[3];
    //     document.getElementById("updateItemStatus").value = updateItemData[4];
    //     document.getElementById("updateItemStatus").placeholder = updateItemData[4];
    //     document.getElementById("updateItemTime").value = updateItemData[5];
    //     document.getElementById("updateItemTime").placeholder = updateItemData[5];
    // }
    // function setupListUpdate(updateListData) {
    //     document.getElementById("").value = updateListData[];
    //     document.getElementById("").value = updateListData[];
    //     document.getElementById("").value = updateListData[];
    //     document.getElementById("").value = updateListData[];
    //     document.getElementById("").value = updateListData[];
    // }
</script>