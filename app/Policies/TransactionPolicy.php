<?php

namespace App\Policies;

use App\User;
use App\Transaction;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransactionPolicy
{
    use HandlesAuthorization;

    public function before($user,$ability)
    {
        if($user->superAdmin()){
            return true;
        }
    }
    /**
     * Determine whether the user can view the transaction.
     *
     * @param  \App\User  $user
     * @param  \App\Transaction  $transaction
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role_id === 2;
    }

    /**
     * Determine whether the user can create transactions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id === 2;
    }

    /**
     * Determine whether the user can update the transaction.
     *
     * @param  \App\User  $user
     * @param  \App\Transaction  $transaction
     * @return mixed
     */
    public function update(User $user, Transaction $transaction)
    {
        return $user->role_id === 2;
    }

    /**
     * Determine whether the user can delete the transaction.
     *
     * @param  \App\User  $user
     * @param  \App\Transaction  $transaction
     * @return mixed
     */
    public function delete(User $user, Transaction $transaction)
    {
        return $user->role_id === 2;
    }

    /**
     * Determine whether the user can restore the transaction.
     *
     * @param  \App\User  $user
     * @param  \App\Transaction  $transaction
     * @return mixed
     */
    public function restore(User $user, Transaction $transaction)
    {
        return $user->role_id === 2;
    }

    /**
     * Determine whether the user can permanently delete the transaction.
     *
     * @param  \App\User  $user
     * @param  \App\Transaction  $transaction
     * @return mixed
     */
    public function forceDelete(User $user, Transaction $transaction)
    {
        return $user->role_id === 2;
    }
}
