<?php
class Mproductfieldgroup extends CI_Model
{
    private $tableName = 'product_field_group';
    public function __construct()
    {
        parent::__construct();
    }

    public function addData($data)
    {
        $this->db->insert($this->tableName, $data);
        $id = $this->db->insert_id();

        if ($id > 0) {
            return $id;
        } else {
            return false;
        }
    }

    public function updateData($id, $data)
    {
        $this->db->where('pfg_id', $id);
        $this->db->update($this->tableName, $data);

        return true;
    }

    public function deleteData($id)
    {
        $this->db->where('pfg_id', $id);
        $this->db->delete($this->tableName);

        return true;
    }

    public function getProductFieldGroup($id)
    {
        $this->db->where('pfg_id', $id);

        $query = $this->db->get($this->tableName);

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getProductFieldGroups(
        $where = array(),
        $orderBy = '',
        $orderType = '',
        $record = 0,
        $start = 0,
        $countOnly = false
    ) {
        if ($countOnly) {
            return $this->countList($where);
        } else {
            return $this->getList($where, $orderBy, $orderType, $record, $start);
        }
    }

    public function countList($where)
    {
        if (!empty($where)) {
            foreach ($where as $colName => $value) {
                if ($value != '') {
                    $this->db->where($colName, $value);
                }
            }
        }

        $query = $this->db->get($this->tableName);

        return $query->num_rows();
    }

    public function getList($where = array(), $orderBy, $orderType, $record, $start)
    {
        if (!empty($where)){
            foreach ($where as $colName => $value) {
                if ($value != '') {
                    $this->db->where($colName, $value);
                }
            }
        }
        if ($orderBy != '' && $orderType != '') {
            switch ($orderBy) {
                case 'id' :
                    $this->db->order_by('product_field_group.pfg_id', $orderType);
                    break;
                default:
                    $this->db->order_by('product_field_group.pfg_id', $orderType);
                    break;
            }
        }

        if ($record > 0) {
            $this->db->limit($record, $start);
        }
        $query = $this->db->get($this->tableName);

        return $query->result_array();
    }

    public function getMaxDisplayOrder()
    {
        $this->db->select('Max(pfg_displayorder) as displayorder');
        $result = $this->db->get($this->tableName)->row_array();

        return ((int)$result['displayorder'] + 1);
    }
}
