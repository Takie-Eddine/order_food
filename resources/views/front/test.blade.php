<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add Remove Dynamic HTML Fields using JQuery Plugin in PHP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
        <script src="repeater.js" type="text/javascript"></script>
    </head>
<body>
    <div class="container">
        <br />
        <h3 align="center">Add Remove Dynamic HTML Fields using JQuery Plugin in PHP</h3>
        <br />
        <div style="width:100%; max-width: 600px; margin:0 auto;">
            <div class="panel panel-default">
                <div class="panel-heading">Add Programming Skill Details</div>
                <div class="panel-body">
                    <span id="success_result"></span>
                    <form method="post" id="repeater_form">
                        <div class="form-group">
                            <label>Enter Programmer Name</label>
                            <input type="text" name="name" id="name" class="form-control" required />
                        </div>
                        <div id="repeater">
                            <div class="repeater-heading" align="right">
                                <button type="button" class="btn btn-primary repeater-add-btn">Add More Skill</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="items" data-group="programming_languages">
                                <div class="item-content">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-9">
                                                    <label>Select Programming Skill</label>
                                                    <select class="form-control" data-skip-name="true" data-name="skill[]" required>
                                                        <option value="">Select</option>
                                                        <option value="PHP">PHP</option>
                                                        <option value="Mysql">Mysql</option>
                                                        <option value="JQuery">JQuery</option>
                                                        <option value="Ajax">Ajax</option>
                                                        <option value="AngularJS">AngularJS</option>
                                                        <option value="Codeigniter">Codeigniter</option>
                                                        <option value="Laravel">Laravel</option>
                                                        <option value="Bootstrap">Bootstrap</option>
                                                    </select>
                                            </div>
                                                <div class="col-md-3" style="margin-top:24px;" align="center">
                                                    <button id="remove-btn" class="btn btn-danger" onclick="$(this).parents('.items').remove()">Remove</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

      <div class="clearfix"></div>
                        <div class="form-group" align="center">
       <br /><br />
                            <input type="submit" name="insert" class="btn btn-success" value="insert" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function(){

        $("#repeater").createRepeater();

        $('#repeater_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"insert.php",
                method:"POST",
                data:$(this).serialize(),
                success:function(data)
                {
                    $('#repeater_form')[0].reset();
                    $("#repeater").createRepeater();
                    $('#success_result').html(data);
                    /*setInterval(function(){
                        location.reload();
                    }, 3000);*/
                }
            });
        });

    });

    </script>

    <script>
        jQuery.fn.extend({
    createRepeater: function () {
        var addItem = function (items, key) {
            var itemContent = items;
            var group = itemContent.data("group");
            var item = itemContent;
            var input = item.find('input,select');
            input.each(function (index, el) {
                var attrName = $(el).data('name');
                var skipName = $(el).data('skip-name');
                if (skipName != true) {
                    $(el).attr("name", group + "[" + key + "]" + attrName);
                } else {
                    if (attrName != 'undefined') {
                        $(el).attr("name", attrName);
                    }
                }
            })
            var itemClone = items;

            /* Handling remove btn */
            var removeButton = itemClone.find('.remove-btn');

            if (key == 0) {
                removeButton.attr('disabled', true);
            } else {
                removeButton.attr('disabled', false);
            }

            $("<div class='items'>" + itemClone.html() + "<div/>").appendTo(repeater);
        };
        /* find elements */
        var repeater = this;
        var items = repeater.find(".items");
        var key = 0;
        var addButton = repeater.find('.repeater-add-btn');
        var newItem = items;

        if (key == 0) {
            items.remove();
            addItem(newItem, key);
        }

        /* handle click and add items */
        addButton.on("click", function () {
            key++;
            addItem(newItem, key);
        });
    }
});
    </script>
    </body>
</html>

