<?php


namespace Rest\Monitoring;


class Profile
{

    public function getList()
    {        $result=y_monitoring_profiles::GetList(array(),
        array('ID' =>ASC,
              'NAME' =>ASC,
        ));
        var_dump($result);
    }

    public function getById($id)
    {
        $result = y_monitoring_profiles::GetList(array());
        if ($object = $result->GetNext()) {
            $arFields = $object->GetFields();
            $id = y_monitoring_profiles::GetByID($arFields['ID']);
            echo $id['ID'];
        }
    }

    public function edit(array('ID','NAME','URL','METHOD','CHECK_INTERVAL','ACTIVITY'),$id)
    {
        $result = y_monitoring_profiles::update($id, array(
            "NAME"=>'varchar',
            "URL"=>'varchar',
            "METHOD"=>'varchar',
            "CHECK_INTERVAL"=>3600,
            "ACTIVITY"=>'varchar',
        ));
        if (!$result->isSuccess())
        {
            $error=$result->getErrorMessages();
        }
    }
    public function add(array('ID','NAME','URL','METHOD','CHECK_INTERVAL','ACTIVITY'),$id)
{
    $result = y_monitoring_profiles::add(array(
        "NAME" => 'varchar',
        "URL" => 'varchar',
        "METHOD" => 'varchar',
        "CHECK_INTERVAL"=> 3600,
        "ACTIVITY" => 'varchar',
    ));

    if ($result->isSuccess())
    {
        $id=$result->getId();
    }
    if (!$result->isSuccess())
    {
        $error=$result->getErrorMessages();
    }
}

    public function delete($id)
{
    $result = y_monitoring_profiles::delete($id);
    if (!$result->isSuccess())
    {
        $error= $result->getErrorMessages();
    }
}

}