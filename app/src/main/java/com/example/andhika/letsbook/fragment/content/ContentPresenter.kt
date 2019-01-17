package com.example.andhika.letsbook.fragment.content

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.deps.FragmentScoped
import com.example.andhika.letsbook.model.EventRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

@FragmentScoped
class ContentPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter() , ContentContract.Presenter {

    var view: ContentContract.View? = null

    override fun goToMain(request: EventRequest) {
        compositeDisposable.addAll(networkManager.doGetEvent({
            when{
                it.status ?: false ->{
                    view?.getListEvent(it)
                }
            }
        },{

        }))
    }

    override fun takeView(view: ContentContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }
}