package com.example.andhika.letsbook.fragment.detil_refund

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.deps.ActivityScoped
import com.example.andhika.letsbook.deps.FragmentScoped
import com.example.andhika.letsbook.model.RefundRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

@ActivityScoped
class DetilRefundPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter(),
    DetilRefundContract.Presenter {

    var view: DetilRefundContract.View? = null

    override fun goToMain(request: RefundRequest) {
        compositeDisposable.addAll(networkManager.doRefund(request,{
            view?.getrefund(it)
        },{

        }))
    }

    override fun takeView(view: DetilRefundContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }

}