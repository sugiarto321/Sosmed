
<div class="friend" style="margin: 60px;" >
 <?php foreach ($Model as $item){?>
    <div class="row">     
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img alt="300x200" data-src="holder.js/300x200" style="width: 300px; height: 200px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAADICAYAAABS39xVAAAEr0lEQVR4nO3bMVLjSABA0bn/UcicOXHmzKFzH0FXmIlU1RYtTNXAsl/zgpdAI8lQ+tUtWr+WZfkNUPDrpy8A4LMEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIEKyDeXt7e3K/36fj7vf707jT6bR7zPP5/DT2drv99XWeTqdPn3/7mR6Px3Tc9Xp9Gne5XH7878HXEqyDeDwe727s1fV6fRp7u912x26Puw3L3jG/4jq3Mfpo7DbEl8tlOu58Pv/434avI1gHMd6w600/zozGsWuExpt5NisZw7YGYpzF7M10Pnud6zHHMI3nH8euX1s/0zgjG39+Dek4g/yKGSH/D4J1ELMIzW748UYeZynr2DEEaxzGY45xWEMwhm0Mzhi3NSSz6xzPNZ5/Npsbz7UGczzP7HdiaXgcgnVgs2XR3gxpFoK9Z0GzEIxLx8fj8RS2j55PrbbB2pshzYI5i92yzCNMm2Ad0BilvZt4OxvZLv9my6zVbJY0BuZyuTwtR/ce/M9+dj3mbDm6LPPl396sbe+z0iVYB7R9AD1b+n11sGbn/exybBw/W2YKFivBOrBxprXe9N8ZrGV5vwXh1TXu/UdPsJgRrIPbznS+O1jj8V/NrsZYbZeugsWMYB3cNh7f9dB9Wd5vRv3o+dWrmZiH7swI1gGMN/c4G5rtb/qObQ2r2SbTWSy24/Y+1+wz2dbwbxOsg5gFYLZJcxz7auPo7BnY3gxt/PrtdpvuwdqOe7VUm218nc2mZsG2cfSYBOsgPnrd5rtfzdnbc7Xdm/XR8WbX4NUctgTrQGY3+H/x8vPenqvt/qpX7xHuRXP7fS8//7sEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgAzBAjIEC8gQLCBDsIAMwQIyBAvIECwgQ7CADMECMgQLyBAsIEOwgIw/XTnG3++63PQAAAAASUVORK5CYII=">
            <div class="caption">
              <h3>User Name:<?php echo $item->getUsername();?></h3>
              <p>Birthday :<?php echo $item->getTgl_lahir();?>
              <p>Email :<?php echo $item->getEmail();?></p></p>
              
            <p><a role="button" class="btn btn-primary" href="#">Add Friend</a> <a role="button" class="btn btn-success" href="<?php echo site_url('/message/message_c')?>">Message</a></p>
            </div>
          </div>
        </div>
        
<?php }?>
      </div>
    </div>