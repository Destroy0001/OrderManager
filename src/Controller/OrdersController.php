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
            throw new BadRequestException('Invalid Request');
        }
        
        $data = $this->request->data;
        if(empty($data)){
            throw new BadRequestException('Invalid Request Data');
        }
        $orderID = $data['id']; 
        if(empty($orderID)){
            throw new BadRequestException('Invalid OrderID :'.$orderID);
        }
        $orderColumn = $data['columnName']; 
        if(empty($orderColumn)){
            throw new BadRequestException('Invalid Column Name :'.$orderColumn);
        }
        $orders = $this->Orders;
        $updateKeys = $orders::$updateKeys;
        
        $saveColumn = $updateKeys[$orderColumn];
       
        if(empty($saveColumn)){
            throw new BadRequestException('Invalid Column Name :'.$saveColumn);
        }
        
        $orderData = $data['columnData'];
        //not checking with empty as empty treats boolean false as empty too. */ 
        if($orderData === null){
            throw new BadRequestException('Invalid Data to save: '.$orderData);
        }
        
        $order = $this->Orders->get($orderID);
        if($saveColumn === 'orderShippingDate'){
           $orderData = strtotime($orderData);
        }
        
        if($order->{$saveColumn} !== $orderData){
            $order->{$saveColumn} = $orderData;
            $order->orderLastUpdated = new \Datetime();
            $orders->save($order);
        }

        $this->autoRender = false;
        $this->response->type('json');
        $this->response->body(json_encode(array("saved"=>true)));
        return $this->response;
    }

}
