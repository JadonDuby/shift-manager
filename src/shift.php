<?php
// session_start();
include_once("config.php");
include "user.php";
// Interface representing a state

interface ShiftState
{
    public function assignShift(Shift $shift, user $user);

    public function unassignShift(Shift $shift);

    public function requestShift(Shift $shift, user $user);

    public function requestCoverage(Shift $shift, user $user);

    public function getState();

}

// Concrete state classes

class UnassignedState implements ShiftState
{
    public $state;

    public function __construct(){
        $this->state="unassigned";
    }

    public function getState(){
        return $this->state;
    }

    public function assignShift(Shift $shift, user $user){
        $shift->setState(new AssignedState($user));
        echo "Shift assigned to user with ID $userId.\n";
    }

    public function unassignShift(Shift $shift){
        echo "shift already not assigned";
    }

    public function requestShift(Shift $shift, $user){
        echo "shift requested";
        $shift->setState(new PendingState(null, $user));
    }

    public function requestCoverage(Shift $shift, $user){
        echo "cannot request coverage for unassigned shift";
    }

}

class AssignedState implements ShiftState
{
    private $userId;
    private user $user
    public $state;

    public function __construct(){
        $this->state="assigned";
        $this->userId = $userId;
    }

    public function getState(){
        echo "the current state is assigned.\n";
        return $this->state;
    }

    public function assignShift(Shift $shift, $user)
    {
        $id = $this->user->getId();
        echo "Shift is already assigned to user with ID $id.\n";
    }

    public function unassignShift(Shift $shift)
    {
        echo "Shift unassigned.\n";
        $shift->setUser(null);
        $shift->setState(new UnassignedState());
    }

    public function requestShift(Shift $shift, $userId){
        echo "cannot request assigned shift.\n";
    }

    public function requestCoverage(Shift $shift, User $drupUser, User $pickUpUser){
        echo "coverage requsted.\n";
        $shift->setState(new PendingState($shift, $dropUser, $pickUpUser));
    }
}

class PendingState implements ShiftState
{
    private $dropUser;
    private $pickupUser;
    private $state;

    public function __construct($dropUser = NULL, $pickupUser = NULL){
        $this->dropUserId = $dropUserId;
        $this->pickupUserId = $pickupUserId;
        $this->state = "pending";
    }

    public function getState(){
        echo "the current state is pending.\n";
        return $this->state;
    }

    public function assignShift(Shift $shift, $userId){
        // Transition to the assigned state
        $shift->setState(new AssignedState($this->pickupUserId));
        echo "Shift assigned to user with ID $this->pickupUserId.\n";
    }

    public function unassignShift(Shift $shift){
        // Cancel the approved shift
        echo "Shift unassigned.\n";
        $shift->setUserId(null);
        $shift->setState(new UnassignedState());
    }

    public function requestShift(Shift $shift, $userId){
        echo "shift requested by user with userId $userId.\n";
        $shift->setState(new PendingState($this->dropUserId, $userId));
    }

    public function requestCoverage(Shift $shift){
        echo "cannot request coverage for pending shift.\n";
    }
}

// Context class representing a shift

class Shift
{
    private $user;
    private $state;
    public $userId;
    private $shiftId;

    public function __construct(User $user, $shiftId = Null, $status){
        echo $state;
        switch($status){
            case 'ASSIGNED':
                $this->state = new AssignedState();
                break;
            case 'UNASSIGNED':
                $this->state = new UnassignedState();
                break;
            case 'PENDING':
                $this->state = new PendingState();
                break;
        }
        $this->user = $user;
        $this->shiftId = $shiftId;
    }

    public function getUserId(){
        echo "current user id is $this->userId.\n";
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function setState(ShiftState $state){
        $this->state = $state;
    }

    public function getState(){
        return $this->state->getState();
    }

    public function assign(user $user){
        if ($user->isAdmin()){
            $this->setUserId($user->getId());
            $this->state->assignShift($this, $userId);
        }
        else{
            echo "only admins can assign shifts.\n";
        }
    }

    public function unassign(){
        if (!$this->isAdmin){
            $this->state->unassignShift($this);
        }
       else{
            echo "only admins can unassign shifts.\n";
        }
    }

    public function requestShift($userId){
        if ($this->isAdmin){
            $this->state->requestShift($this, $userId);
        }
       else{
            echo "only employees can request shifts.\n";
        }
    }

    public function requestCoverage(){
        $this->state->requestCoverage($this, $this->userId);
    }
}

// Example usage
$user = new User(1, "a", "a", "ADMIN");
$shift = new Shift($user, 1);

// $shift->assign(123);   // Output: Shift assigned to user with ID 123.
$shift->getState();
// $shift->getUserId();
// $shift->requestCoverage();
// $shift->requestShift(321);

// $shift->cancel();       // Output: Shift canceled.
?>