<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>To-Do List</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php $currentItemId = 0; ?>

<main class="d-flex p-5">

    <?php foreach ($listData as $list): ?>

        <div class="mx-3 list-group-item">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-primary"><?php echo $list['list_name']?></li>
            </ul>
            <ul class="list-unstyled overflow-auto mh-80">
                <?php foreach ($itemData as $item): ?>
                    <?php if ($item["list_id"] === $list["list_id"]) { ?>
                        <li class="list-group-item pb-0"><p><?php echo $item["item_name"] ?></p></li>
                    <?php } ?>
                <?php endforeach; ?>
                <li class="list-group-item pb-2"><a onclick="setUpItemAdd(newItem, '<?php echo $list["list_id"] ?>')" href="#" data-toggle="modal" data-target="#newItem">
                        <i class="fas fa-plus">New Item</i></a></li>

            </ul>
        </div>
    <?php endforeach; ?>

    <div class="mx-3 list-group-item">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center font-weight-bold text-primary"><a href="#" data-toggle="modal" data-target="#newList">
                    <i class="fas fa-plus"> New List</i></a></li>
        </ul>
    </div>



<!--gives the list_id to the item add form-->
    <script>
    function setUpItemAdd(modal, listId)
    {
        modal.getElementsByClassName("itemId")[0].value = listId;
    }
    </script>


<!--List add-->
    <div class="modal fade" id="newList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newListTitle">New List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0 mt-2">Title</p><input type="text" class="form-control" placeholder="Title">
                    <p class="mb-0 mt-2">Details</p><input type="text" class="form-control" placeholder="Details">
                    <p class="mb-0 mt-2">Estimated time</p><input type="number" min="0" class="form-control" placeholder="Minutes">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save List</button>
                </div>
            </div>
        </div>
    </div>


<!--item add-->
    <div class="modal fade" id="newItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newItemTitle">New Item</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <input class="itemId" name="itemId" value="" type="number" placeholder="ID" required hidden>
                        <p class="mb-0 mt-2">Title</p><input name="itemName" type="text" class="form-control" placeholder="Title" required>
                        <p class="mb-0 mt-2">Details</p><input name="itemDetails" type="text" class="form-control" placeholder="Details">
                        <p class="mb-0 mt-2">Estimated time</p><input name="itemTime" type="number" min="0" class="form-control" placeholder="Minutes">
                        <input type="submit">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

</body>
</html>
