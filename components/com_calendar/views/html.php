<?php
class ComCalendarViewHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $user = JFactory::getUser();
        $this->assign('user', $user);
        $this->assign('agent', $user->gid > 18);
        
        return parent::display();
    }
}