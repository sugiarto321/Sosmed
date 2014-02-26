<!DOCTYPE HTML>
<html>
    <head>
        <style>
            #login {
                margin: auto;
                border: 1px solid black;
                position: relative;
                top: 100px;
                width: 400px;
                height: 500px;
            }
        </style>
    </head>
    <body>
        <?php echo form_open('admin/x_admin/login'); ?>
        <table id="login">
            <tr height="300px">
                <td>
                    <?php  ?>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="text" name="user" placeholder="User Name" />
                    <input type="password" name="pass" placeholder="Password" />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit"/>
                    <a href="<?php echo base_url();?>">Back to home</a>
                </td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </body>
</html>


