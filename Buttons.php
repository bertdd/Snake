<?php


class Buttons
{
    public function Empty() : string
    {
        return "<td class='button'/>";
    }

    public function Button(string $key) : string
    {
        return "<td><input type='submit' name='dir' value='" . $key . "' class='button buttonWithText'></td>";
    }

    public function Render()
    {
        echo '<form>';
        echo '<table>';
        echo '<tr>' . $this->Empty() . $this->Button('UP') . $this->Empty() . '</tr>';
        echo '<tr>' . $this->Button('LEFT') . $this->Empty() . $this->Button('RIGHT') . '</tr>';
        echo '<tr>' . $this->Empty() . $this->Button('DOWN') . $this->Empty() . '</tr>';
        echo '</table>';
        echo '</form>';
    }
}