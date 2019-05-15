<?php
//interface implented by patternobserver
//to communicate with subject
interface Observer{
    public function update(Subject $subject);
}
?>