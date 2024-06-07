<div class="modal fade" id="periodicorder{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    periodic order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{--  form  --}}
            <form action="{{ route('order.periodic','test') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $order->id}}">
                        <div class="col">
                            <label for="period" class="mr-sm-2">Period for weeks</label>
                            <input id="period" type="number" name="period" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" name="predioc" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Are you make order predioc
                            </label>
                          </div>                          
                    </div>
                    <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

