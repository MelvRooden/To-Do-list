<main>
    <div>
        <div class="btn-primary active">
            <h1 class="m-0 pl-4 d-inline">ToDo</h1>
        </div>
        <div class="bg-primary">
            <p class="m-0 pl-4">Welcome back!</p>
        </div>
    </div>

    <div class="d-flex p-5">
        <?php foreach ($listData as $list): ?>

            <div style="width:280px;" class="mx-2">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold btn-primary active"><?php echo $list['list_name']?>
                        <div class="d-inline float-right">
                            <div class="list-group-item p-0">
                                <div style="width:10px;" class="container">
                                    <div class="row">
                                        <a class="col p-0 pl-2" style="font-size:10px;" href="#" onclick="setupListUpdate(<?php echo $list["list_id"]?>, '<?php echo $list["list_name"]?>', <?php echo $list["list_status"] ?>)"  data-toggle="modal" data-target="#updateList">✎</a>
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
                                                <a class="col p-0 pl-2" style="font-size:10px;" href="#" onclick="setUpItemUpdate(<?php echo $item["item_id"] ?>, <?php echo $item["list_id"] ?>, '<?php echo $item["item_name"] ?>', '<?php echo $item["item_details"] ?>', <?php echo $item["item_status"] ?>, <?php echo $item["item_time"] ?>)" data-toggle="modal" data-target="#updateItem">✎</a>
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
                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold btn-primary active"><a href="#" data-toggle="modal" data-target="#newList">
                        <i class="fas fa-plus text-white"> New List</i></a></li>
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
                        <input value="0" name="createListStatus" type="number" placeholder="" hidden>
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
    <div class="modal fade" id="updateList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newListTitle">Edit List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Main/updateList/') ?>" method="post">
                    <div class="modal-body">
                        <input value="" id="updateListId" name="updateListId" type="number" placeholder="" required hidden>
                        <p class="mb-0 mt-2">Title</p><input id="updateListName" name="updateListName" type="text" class="form-control" placeholder="Title" required>
                        <p class="mb-0 mt-2">Status</p><input id="updateListStatus" name="updateListStatus" min="0" max="1" type="number" class="form-control" placeholder="Status" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save List</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!------------Item create------------>
    <div class="modal fade" id="newItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newItemTitle">New Item</h5>
                    <div style="font-size:12px;" class="" hidden>
                        <p class="">Add to list:&nbsp;</p><p class="" id="createItemListName"></p>
                    </div>
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
    <div class="modal fade" id="updateItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newItemTitle">Edit Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('Main/UpdateItem/') ?>" method="post">
                    <div class="modal-body">
                        <input id="updateItemId" name="updateItemId" type="number" placeholder="ID" required hidden>
                        <input id="updateItemListId" name="updateItemListId" type="number" placeholder="ID" required hidden>
                        <p class="mb-0 mt-2">Title</p><input id="updateItemName" name="updateItemName" type="text" class="form-control" placeholder="Title" required>
                        <p class="mb-0 mt-2">Details</p><input id="updateItemDetails" name="updateItemDetails" type="text" class="form-control h-20" placeholder="Details">
                        <p class="mb-0 mt-2">Status</p><input id="updateItemStatus" value="0" name="updateItemStatus"  type="number" min="0" max="1" class="form-control h-20" placeholder="Details" required hidden>
                        <p class="mb-0 mt-2">Estimated time</p><input id="updateItemTime" name="updateItemTime" type="number" min="0" class="form-control" placeholder="Minutes">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script>

    function setupListUpdate(updateListId, updateListName, updateListStatus)
    {
        document.getElementById("updateListId").value = updateListId;
        document.getElementById("updateListName").value = updateListName;
        document.getElementById("updateListName").placeholder = updateListName;
        document.getElementById("updateListStatus").value = updateListStatus;
        document.getElementById("updateListStatus").placeholder = updateListStatus;
    }

    function setUpItemCreate(createItemListId, createItemName)
    {
        document.getElementById("createItemListId").value = createItemListId;
        document.getElementById("createItemListName").innerText = createItemName;
    }

    function setUpItemUpdate(updateItemId, updateItemListId, updateItemName, updateItemDetails, updateItemStatus, updateItemTime)
    {
        document.getElementById("updateItemId").value = updateItemId;
        document.getElementById("updateItemListId").value = updateItemListId;
        document.getElementById("updateItemName").value = updateItemName;
        document.getElementById("updateItemName").placeholder = updateItemName;
        document.getElementById("updateItemDetails").value = updateItemDetails;
        document.getElementById("updateItemDetails").placeholder = updateItemDetails;
        document.getElementById("updateItemStatus").value = updateItemStatus;
        document.getElementById("updateItemStatus").placeholder = updateItemStatus;
        document.getElementById("updateItemTime").value = updateItemTime;
        document.getElementById("updateItemTime").placeholder = updateItemTime;
        console.log(updateItemId, updateItemListId, updateItemName, updateItemDetails, updateItemStatus, updateItemTime);
    }

</script>