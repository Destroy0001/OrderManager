<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\ForbiddenException;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{

    /**
     * method: display
     * methodDescription: Displays orders information
     * 
     * @throws BadRequestException
     * @return \Cake\Network\Response
     */
    public function display()
    {

        $userID = $this->Auth->user('id');
        if($userID == null ){
            throw new UnauthorizedException();
        }
        
        $queryParams = $this ->request->query;
        if(!$queryParams){
            throw new BadRequestException();
        }
        
        $Orders = $this
        ->Orders
        ->find('OrderData',
                array(
                        'user' => $this->Auth->user('id'),
                        'queryParams' => $queryParams )
        );
        
        $this->autoRender = false;
        $this->response->type('json');
        $this->response->body(json_encode($Orders));
        return $this->response;
    }

    /**
     * methodName: save
     * methodDescription: Saves params from the editable grid 
     * @throws UnauthorizedException
     * @throws BadRequestException
     * @return \Cake\Network\Response
     */
    public function save(){
        $userID = $this->Auth->user('id');
        if(!$userID ){
            throw new UnauthorizedException();
        }
        
        if(!$this->request->is('post')){
            throw new BadRequestException();
        }
        
        $data = $this->request->data;
        if(!$data){
            throw new BadRequestException();
        }
        $orderID = $data['id']; 
        if(!$orderID){
            throw new BadRequestException();
        }
        $orderColumn = $data['columnName']; 
        if(!$orderColumn){
            throw new BadRequestException();
        }
        $orders = $this->Orders;
        $updateKeys = $orders::$updateKeys;
        
        $saveColumn = $updateKeys[$orderColumn];
       
        if(!$saveColumn){
            throw new BadRequestException();
        }
        
        $orderData = $data['columnData'];
        if($orderData === null || trim($orderData) ===''){
            throw new BadRequestException();
        }
        
        $order = $this->Orders->get($orderID);
        if($saveColumn === 'orderShippingDate'){
           $orderData = strtotime($orderData);
        }
        
        $order->{$saveColumn} = $orderData;
        $order->orderLastUpdated = new \Datetime(); 
        $orders->save($order);

        $this->autoRender = false;
        $this->response->type('json');
        $this->response->body(json_encode(array("saved"=>true)));
        return $this->response;
    }

}
